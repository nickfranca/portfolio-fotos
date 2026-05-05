<?php

namespace App\Http\Controllers;

use App\Models\Artigo;
use App\Models\Configuracao;
use App\Models\Foto;
use App\Models\Projeto;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class MediaController extends Controller
{
    public function foto(Foto $foto)
    {
        return $this->watermarkedImage($foto->caminho, $foto->titulo ?: 'foto', false, $foto);
    }

    public function downloadFoto(Foto $foto)
    {
        return $this->watermarkedImage($foto->caminho, $foto->titulo ?: 'foto', true, $foto);
    }

    public function artigoCapa(Artigo $artigo)
    {
        abort_unless($artigo->imagem_capa, 404);

        return $this->watermarkedImage($artigo->imagem_capa, $artigo->titulo);
    }

    public function projetoCapa(Projeto $projeto)
    {
        abort_unless($projeto->imagem, 404);

        return $this->watermarkedImage($projeto->imagem, $projeto->titulo);
    }

    private function watermarkedImage(string $path, string $name, bool $download = false, ?Foto $foto = null): Response
    {
        [$contents, $mime] = $this->readImage($path);

        $settings = Configuracao::mapa();
        $text = $settings['watermark_text'] ?? config('app.name', 'Portfolio');
        $opacity = max(0.05, min(0.9, ((int) ($settings['watermark_opacity'] ?? 22)) / 100));
        $fontSize = max(18, min(96, (int) ($settings['watermark_size'] ?? 42)));
        [$x, $y, $anchor] = $this->position($settings['watermark_position'] ?? 'bottom-right');

        $encodedImage = base64_encode($contents);
        $safeText = e($text);
        $preserveAspectRatio = $this->preserveAspectRatio($foto);

        $svg = <<<SVG
<svg xmlns="http://www.w3.org/2000/svg" width="1600" height="1067" viewBox="0 0 1600 1067">
  <rect width="1600" height="1067" fill="white"/>
  <image href="data:{$mime};base64,{$encodedImage}" width="1600" height="1067" preserveAspectRatio="{$preserveAspectRatio}"/>
  <rect width="1600" height="1067" fill="transparent"/>
  <text x="{$x}" y="{$y}" text-anchor="{$anchor}" font-family="Inter, Arial, sans-serif" font-size="{$fontSize}" font-weight="700" letter-spacing="3" fill="white" fill-opacity="{$opacity}" stroke="black" stroke-opacity="0.18" stroke-width="2">{$safeText}</text>
</svg>
SVG;

        $filename = str($name)->slug()->append('-com-marca-dagua.svg')->toString();

        return response($svg, 200, [
            'Content-Type' => 'image/svg+xml',
            'Content-Disposition' => ($download ? 'attachment' : 'inline') . '; filename="' . $filename . '"',
            'Cache-Control' => 'public, max-age=300',
        ]);
    }

    private function preserveAspectRatio(?Foto $foto): string
    {
        if (! $foto) {
            return 'xMidYMid slice';
        }

        $x = match ($foto->posicao_x) {
            'left' => 'xMin',
            'right' => 'xMax',
            default => 'xMid',
        };

        $y = match ($foto->posicao_y) {
            'top' => 'YMin',
            'bottom' => 'YMax',
            default => 'YMid',
        };

        $mode = $foto->ajuste === 'contain' ? 'meet' : 'slice';

        return "{$x}{$y} {$mode}";
    }

    private function readImage(string $path): array
    {
        foreach (['local', 'public'] as $disk) {
            if (Storage::disk($disk)->exists($path)) {
                return [
                    Storage::disk($disk)->get($path),
                    Storage::disk($disk)->mimeType($path) ?: 'image/jpeg',
                ];
            }
        }

        abort(404);
    }

    private function position(string $position): array
    {
        return match ($position) {
            'top-left' => [70, 110, 'start'],
            'top-right' => [1530, 110, 'end'],
            'center' => [800, 545, 'middle'],
            'bottom-left' => [70, 995, 'start'],
            default => [1530, 995, 'end'],
        };
    }
}

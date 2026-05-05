<?php

namespace App\Http\Controllers;

use App\Models\Configuracao;
use Illuminate\Http\Request;

class ConfiguracaoController extends Controller
{
    public function update(Request $request)
    {
        $data = $request->validate([
            'site_label' => ['nullable', 'string', 'max:255'],
            'hero_title' => ['nullable', 'string', 'max:255'],
            'hero_highlight' => ['nullable', 'string', 'max:255'],
            'hero_subtitle' => ['nullable', 'string', 'max:255'],
            'hero_badge' => ['nullable', 'string', 'max:255'],
            'cover_foto_id' => ['nullable', 'integer', 'exists:fotos,id'],
            'cover_image_url' => ['nullable', 'string', 'max:1000'],
            'works_title' => ['nullable', 'string', 'max:255'],
            'works_index_label' => ['nullable', 'string', 'max:255'],
            'works_index_value' => ['nullable', 'string', 'max:255'],
            'portfolio_quote' => ['nullable', 'string', 'max:1000'],
            'portfolio_quote_author' => ['nullable', 'string', 'max:255'],
            'intro_label' => ['nullable', 'string', 'max:255'],
            'intro_title' => ['nullable', 'string', 'max:255'],
            'intro_highlight' => ['nullable', 'string', 'max:255'],
            'intro_text' => ['nullable', 'string'],
            'intro_hover_title' => ['nullable', 'string', 'max:255'],
            'intro_hover_subtitle' => ['nullable', 'string', 'max:255'],
            'intro_foto_id' => ['nullable', 'integer', 'exists:fotos,id'],
            'intro_image_url' => ['nullable', 'string', 'max:1000'],
            'footer_title' => ['nullable', 'string', 'max:255'],
            'footer_cta_text' => ['nullable', 'string', 'max:255'],
            'footer_cta_url' => ['nullable', 'string', 'max:1000'],
            'instagram_url' => ['nullable', 'string', 'max:1000'],
            'behance_url' => ['nullable', 'string', 'max:1000'],
            'email_url' => ['nullable', 'string', 'max:1000'],
            'watermark_text' => ['nullable', 'string', 'max:255'],
            'watermark_position' => ['required', 'in:top-left,top-right,center,bottom-left,bottom-right'],
            'watermark_opacity' => ['required', 'integer', 'min:5', 'max:90'],
            'watermark_size' => ['required', 'integer', 'min:18', 'max:96'],
            'site_bg_color' => ['required', 'string', 'max:20'],
            'site_text_color' => ['required', 'string', 'max:20'],
            'site_accent_color' => ['required', 'string', 'max:20'],
            'admin_accent_color' => ['required', 'string', 'max:20'],
        ]);

        foreach ($data as $chave => $valor) {
            Configuracao::updateOrCreate(['chave' => $chave], ['valor' => $valor]);
        }

        return redirect()->route('admin.index')->with('success', 'Configurações atualizadas.');
    }
}

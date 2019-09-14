<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
Use App\Anuncio;
Use App\EstatisticaAnuncio;
use Illuminate\Support\Facades\DB;
use Mail;

class RelatorioSemanal extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'relatorio:semanal';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envia o relatório semanal para os clientes';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        /* Query relatório Semanal para enviar para os clientes */
        $estatisticas = DB::table('anuncios')
            ->select('titulo','visualizacao','contato')            
            ->join('estatistica_anuncios', 'estatistica_anuncios.anuncio_id', '=', 'anuncios.id')
            ->where('usuario_id', 3)
            ->orderBy('visualizacao','DESC')
            ->get();

        Mail::send('admin.email.estatisticaAnuncio', compact('estatisticas'), function($m){
        $m->from('andnunes88@gmail.com','Anderson');
        $m->to('andnunes88@gmail.com','anderson');
        $m->subject('Resumo Semanal: autodicas.com');
    });
    }
}

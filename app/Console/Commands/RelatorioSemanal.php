<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
Use App\Anuncio;
Use App\EstatisticaAnuncio;
use Illuminate\Support\Facades\DB;
use Mail;
use Illuminate\Support\Facades\Log;

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

       /* Pega os IDS e Emails dos usuarios */
       $usuarios = DB::table('users')            
       ->select('users.id AS usuario_id', 'users.email')
       ->join('anuncios', 'anuncios.usuario_id', '=', 'users.id')
       ->join('estatistica_anuncios', 'estatistica_anuncios.anuncio_id', '=', 'anuncios.id')
       ->groupBy('users.email')
       ->get();  

       foreach ($usuarios as $usuario) {

                /* Pega o total de visualizações e contatos */ 
				$dados = DB::table('users')            
				->select('users.id AS usuario_id', 'users.email', 
					DB::raw('sum(estatistica_anuncios.visualizacao) AS total_visualizacao'), 
					DB::raw('sum(estatistica_anuncios.contato) as total_contato'))
				->join('anuncios', 'anuncios.usuario_id', '=', 'users.id')
				->join('estatistica_anuncios', 'estatistica_anuncios.anuncio_id', '=', 'anuncios.id')
				->where('users.id', $usuario->usuario_id)
				->groupBy('users.email')
				->get();

				try {

                    Mail::send('admin.email.estatisticaAnuncio', compact('dados'), function($m){
                        $m->from('andnunes88@gmail.com','Anderson');
                        $m->to($usuario->email);
                        $m->bcc('andnunes88@gmail.com','anderson');
                        $m->subject('Resumo Semanal: autodicas.com');
                    });

                    Log::info('O relatório semanal foi foi enviado para email: '. $usuario->email);

                } catch (\Exception $e) {
                    Log::warning('O relatório semanal foi foi enviado para email: '. $usuario->email);
                    return $e->getMessage();
                }

            }    

    }
}

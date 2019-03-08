
<style>
    
    .style{
        margin-bottom: 5px;
    }

</style>

<div class="search">
    <form id="search_form" method="get" action="/filtro" role="form">

        <div class="row">

            <div class="col-md-4">
                <input name="produto" type="text" placeholder="Ex:  bateria Moura, óleo 20w50, correia dentada …" class="form-control input-lg-nomobile style">
            </div>

            <div class="extra">
                <div class="col-md-6 no-padding-left no-padding-right">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="selectie big">
                                <select name="categoria_id" class="form-control style input-lg-nomobile">
                                    <option value="">Todas as categorias </option>

                                    
                                    
                                    <option value="#">#</option>

                                    

                                </select>

                            </div>
                        </div>

                        <div class="col-xs-6">
                         <div class="selectie big">

                            <select name="cidade_id" title="Clique para mudar a região" class="form-control style input-lg-nomobile">

                                <option value="">Todas as cidades </option>

                                
                                <option value="#">#</option>

                                

                            </select>

                        </div>


                    </div>
                </div>
            </div>
            <div class="magichappens">
                <div class="col-md-2 col-xs-12 m3">
                    <button type="submit" class="btn-pesquisar btn btn-lg-nomobile btn-shadow btn-primary col-xs-12" id="searchbutton"><svg y="1343" width="18" height="18" viewBox="0 0 18 18" class="hidden-md" fill="currentColor" icn="li-search"><path d="M17.442 15.318l-4.264-3.627c-.44-.395-.912-.578-1.292-.56C12.892 9.95 13.5 8.422 13.5 6.75 13.5 3.022 10.478 0 6.75 0S0 3.022 0 6.75s3.022 6.75 6.75 6.75c1.672 0 3.2-.608 4.38-1.614-.018.38.165.852.56 1.292l3.628 4.264c.62.69 1.635.748 2.253.13.62-.62.562-1.634-.128-2.254zM6.75 11.25c-2.485 0-4.5-2.015-4.5-4.5s2.015-4.5 4.5-4.5 4.5 2.015 4.5 4.5-2.015 4.5-4.5 4.5z" fill="#fff"></path></svg> Pesquisar</button>
                </div>
                <div class="col-md-12 m1">
                    <div class="row margins hidden-xs hidden-sm" id="nekoparams"></div>
                </div>
                <div class="col-xs-6 m2 visible-xs visible-sm">

                </div>
            </div>
        </div>
    </div>
</form>
</div>
<?php

class Controller_Cms_Log extends Core_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->smarty->assign('hoofdmenu_actief', 'communicatie');
    }

    /**
     * @return void
     */
    public function tonen()
    {
        if (
            isset($_GET['p']) &&
            is_numeric($_GET['p'])
        ) {
            $pagina = $_GET['p'];
            $start = ($pagina - 1) * 100;
        } else {
            $pagina = 1;
            $start = 0;
        }

        $log = [];
        $query = ("
        SELECT a.*,
               DATE_FORMAT(a.timestamp, '%d/%m/%Y') AS datum,
               b.voornaam,
               b.naam 
        FROM _log AS a 
        
        LEFT JOIN model AS b
        ON a.id_model = b.model_id
        
        ORDER BY a.timestamp DESC 
        ");

        $tel = Flight::db()->query($query)->num_rows;
        $aantal_paginas = ceil($tel / 100);
        $this->smarty->assign('aantal_paginas', $aantal_paginas);
        $exec = Flight::db()->query($query . " LIMIT " . $start . ", 100");

        while($r = $exec->fetch_array()) {
            $log[$r['id']]['datum'] = $r['datum'];
            $log[$r['id']]['bericht'] = $r['bericht'];
            $log[$r['id']]['voornaam'] = $r['voornaam'];
            $log[$r['id']]['naam'] = $r['naam'];
            $log[$r['id']]['id_model'] = $r['id_model'];
        }

        $this->smarty->assign('log', $log);
        $this->smarty->assign('include', 'cms/log.html');
        $this->smarty->assign('actieve_pagina', $pagina);
        $this->smarty->display('templates/cms/index.tpl');
    }
}

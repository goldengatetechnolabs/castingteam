<?php

class Controller_Cms_Homepage extends Core_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->smarty->assign('hoofdmenu_actief', 'communicatie');
    }

    public function show()
    {
        $models = [];
        $query = Flight::db()->query("SELECT *, DATE_FORMAT(datum, '%d/%m/%Y') AS datum_tonen FROM model WHERE nieuw_actief=0 ORDER BY model_id DESC");

        while($r = $query->fetch_array()) {
            $models[$r['model_id']] = $r;
        }

        $this->smarty->assign('models', $models);

        $log = array();
        $query = Flight::db()->query("
        SELECT a.*,
               DATE_FORMAT(a.timestamp, '%d/%m/%Y') AS datum,
               b.voornaam,
               b.naam 
        FROM _log AS a 
        
        LEFT JOIN model AS b
        ON a.id_model = b.model_id
        
        ORDER BY a.timestamp DESC 
        LIMIT 10
        ");

        while ($r = $query->fetch_array()) {
            $log[$r['id']]['datum'] = $r['datum'];
            $log[$r['id']]['bericht'] = $r['bericht'];
            $log[$r['id']]['voornaam'] = $r['voornaam'];
            $log[$r['id']]['naam'] = $r['naam'];
            $log[$r['id']]['id_model'] = $r['id_model'];
        }

        $this->smarty->assign('log', $log);
        $query1 = Flight::db()->query("SELECT model_id FROM model WHERE YEAR(datum)=" . date('Y') . " AND MONTH(datum)=" . date('m') . " AND DAY(datum)=" . date('d'));
        $this->smarty->assign('tel_nieuw', $query1->num_rows);
        $query2 = Flight::db()->query("SELECT DISTINCT id_model FROM _log WHERE timestamp >= CURDATE()");
        $this->smarty->assign('tel_aangepast', $query2->num_rows);
        $this->smarty->assign('include', 'cms/homepage.html');
        $this->smarty->display('templates/cms/index.tpl');
    }
}

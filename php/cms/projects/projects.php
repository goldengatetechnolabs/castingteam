<?php

class Projects extends Core_Controller
{
    /**
     * @param Account_Admin $account
     */
    public function __construct(Account_Admin $account)
    {
        parent::__construct($account);

        $this->smarty->assign('hoofdmenu_actief', 'projects');
    }
    public function create_project()
    {
        $clients = [];
        $contacts = [];
        $current_client_name = "";
        $current_client_id = "";
        $client_query = Flight::db()->query("SELECT `id`, `company_name` FROM `clients` where `is_archive` = 0 ORDER BY `company_name` ASC");
        $count = 0;
        while ($row = $client_query->fetch_assoc()) {
            if((isset($_GET['client']) && $row["id"] == $_GET['client']) || $count == 0) {
                $current_client_id = $row["id"];
                $current_client_name = $row["company_name"];
            }
            array_push($clients, $row);
            $count++;
        }
        if(!empty($current_client_id)) {
            $contact_query = Flight::db()->query("SELECT `id`, `fname`, `lname` FROM `contacts` WHERE `client_id` = " . Flight::db()->real_escape_string($current_client_id));
            while ($row = $contact_query->fetch_assoc()) {
                array_push($contacts, $row);
            }
        }
        $this->smarty->assign('include_tabs', 'cms/projects/tabs.tpl');
        $this->smarty->assign('tab_active', 'create_project');
        $this->smarty->assign('clients', $clients);
        $this->smarty->assign('contacts', $contacts);
        $this->smarty->assign('first_contact_name', (($contacts[0]["fname"] . " " . $contacts[0]["lname"]) ?? ""));
        $this->smarty->assign('first_contact_id', ($contacts[0]["id"] ?? ""));
        $this->smarty->assign('current_client_name', $current_client_name);
        $this->smarty->assign('current_client_id', $current_client_id);
        $this->smarty->assign('include', 'cms/projects/create-project.tpl');
        $this->smarty->display('templates/cms/index-new.tpl');
    }
    public function store_project()
    {
        Flight::db()->begin_transaction();

        try {
            $project_no = Flight::db()->query("SELECT project_no FROM `projects` ORDER BY id DESC LIMIT 1");
            $pno = $project_no->fetch_assoc();
            $project = Flight::db()->query("INSERT INTO `projects`(`client_id`, `contact_id`, `project_no`, `title`, `start_date`, `status`, `description`, `right_and_usage`, `rights_and_usage_extension`, `extension_start_date`) 
            VALUES (
                " . Flight::db()->real_escape_string($_POST['client_id']) . ",
                " . Flight::db()->real_escape_string($_POST['contact_id']) . ",
                " . (!empty($pno) && !empty($pno["project_no"]) ? ($pno["project_no"] + 1) : 1001) . ",
                '" . Flight::db()->real_escape_string($_POST['title']) . "',
                '" . Flight::db()->real_escape_string($_POST['start_date']) . "',
                '" . Flight::db()->real_escape_string($_POST['status']) . "',
                '" . Flight::db()->real_escape_string($_POST['description']) . "',
                '" . Flight::db()->real_escape_string($_POST['right_and_usage']) . "',
                '" . Flight::db()->real_escape_string($_POST['rights_and_usage_extension']) . "',
                '" . Flight::db()->real_escape_string($_POST['extension_start_date']) . "'
                
            )");
            if ($project) {
                Flight::db()->commit();
                echo json_encode([
                    "status" => 1,
                    "msg" => "Project Added."
                ]);
            } else {
                throw new Exception('Please select a status to add this project');
            }
        } catch (\Exception $e) {
            echo json_encode([
                "status" => 0,
                "error_msg" => $e->getMessage()
            ]);
        }
    }
    public function filter_projects()
    {
        $status = Flight::db()->real_escape_string($_GET["status"]);
        $booker = Flight::db()->real_escape_string($_GET["booker"]);
        $condition = "";
        if($status != "All" && $booker != "All") {
            $condition = "clients.booker = '" . $booker . "' AND projects.status = '" . $status . "' AND";
        } else if($status != "All") {
            $condition = "projects.status = '" . $status . "' AND";
        } else if($booker != "All") {
            $condition = "clients.booker = '" . $booker . "' AND";
        }
        $projects = [];
        $project_query = Flight::db()->query("SELECT projects.id, projects.client_id, projects.project_no, projects.title, projects.status, clients.company_name FROM projects INNER JOIN clients ON projects.client_id = clients.id WHERE " . $condition . " projects.is_archive = 0");
        while ($row = $project_query->fetch_assoc()) {
            $selections = [];
            $selection_query = Flight::db()->query("SELECT selecties.name, selecties.creation_date, (select COUNT(id_model) from selecties_models where selecties_models.id_selectie = project_selections.selection_id ) as modal_count FROM `project_selections` inner join selecties on selecties.id = project_selections.selection_id WHERE project_selections.project_id = " . $row["id"]);
            while ($row1 = $selection_query->fetch_assoc()) {
                array_push($selections, $row1);
            }
            $row["selections"] = $selections;
            array_push($projects, $row);
        }
        echo json_encode($projects);
    }

    public function archive_filter_projects()
    {
        $projects = [];
        $project_query = Flight::db()->query("SELECT projects.id, projects.client_id, projects.project_no, projects.title, projects.status, clients.company_name FROM projects INNER JOIN clients ON projects.client_id = clients.id WHERE clients.booker = '" . Flight::db()->real_escape_string($_GET["booker"]) . "' AND projects.status = '" . Flight::db()->real_escape_string($_GET["status"]) . "' AND projects.is_archive = 1");
        while ($row = $project_query->fetch_assoc()) {
            $selections = [];
            $selection_query = Flight::db()->query("SELECT selecties.name, (select COUNT(id_model) from selecties_models where selecties_models.id_selectie = project_selections.selection_id ) as modal_count FROM `project_selections` inner join selecties on selecties.id = project_selections.selection_id WHERE project_selections.project_id = " . $row["id"]);
            while ($row1 = $selection_query->fetch_assoc()) {
                array_push($selections, $row1);
            }
            $row["selections"] = $selections;
            array_push($projects, $row);
        }
        echo json_encode($projects);
    }

    public function update_project_status()
    {
        Flight::db()->begin_transaction();
        try {
            $project = Flight::db()->query("UPDATE `projects` SET `status`='" . Flight::db()->real_escape_string($_POST['status']) . "' WHERE `id` = " . Flight::db()->real_escape_string($_POST['project_id']));
            if ($project) {
                Flight::db()->commit();
                echo json_encode([
                    "status" => 1,
                    "msg" => "Project Updated."
                ]);
            } else {
                throw new Exception('failed to update project.');
            }
        } catch (\Exception $e) {
            echo json_encode([
                "status" => 0,
                "error_msg" => $e->getMessage()
            ]);
        }
    }

    public function update_project()
    {
        Flight::db()->begin_transaction();
        try {
            $project = Flight::db()->query("UPDATE `projects` SET 
            `status`='" . Flight::db()->real_escape_string($_POST['status']) . "', 
            `client_id`='" . Flight::db()->real_escape_string($_POST['client_id']) . "' ,
            `contact_id`='" . Flight::db()->real_escape_string($_POST['contact_id']) . "' ,
            `title`='" . Flight::db()->real_escape_string($_POST['title']) . "' ,
            `start_date`='" . Flight::db()->real_escape_string($_POST['start_date']) . "' ,
            `status`='" . Flight::db()->real_escape_string($_POST['status']) . "' ,
            `description`='" . Flight::db()->real_escape_string($_POST['description']) . "' ,
            `right_and_usage`='" . Flight::db()->real_escape_string($_POST['right_and_usage']) . "' 
            WHERE `id` = " . Flight::db()->real_escape_string($_POST['project_id']));
            if ($project) {
                Flight::db()->commit();
                echo json_encode([
                    "status" => 1,
                    "msg" => "Project Updated."
                ]);
            } else {
                throw new Exception('failed to update project.');
            }
        } catch (\Exception $e) {
            echo json_encode([
                "status" => 0,
                "error_msg" => $e->getMessage()
            ]);
        }
    }

    public function archive_project()
    {
        Flight::db()->begin_transaction();
        try {
            $project = Flight::db()->query("UPDATE `projects` SET 
            `is_archive`=1
            WHERE `id` = " . Flight::db()->real_escape_string($_POST['id']));
            if ($project) {
                Flight::db()->commit();
                echo json_encode([
                    "status" => 1,
                    "msg" => "Project Archived."
                ]);
            } else {
                throw new Exception('failed to archive project.');
            }
        } catch (\Exception $e) {
            echo json_encode([
                "status" => 0,
                "error_msg" => $e->getMessage()
            ]);
        }
    }

    public function update_project_budget()
    {
        $budget_array = array_values($_POST["budget"]);
        $budget = [];
        foreach($budget_array as $key => $b_array) {
            foreach($b_array as $k => $ba) {
                $budget[$key][$k] = (($k == "talent") ? $ba : ((!empty($ba)) ? ltrim($ba, "€ ") : 0 ));
            }
        }
        Flight::db()->begin_transaction();
        try {
            $project = Flight::db()->query("UPDATE `projects` SET `budget`='" . json_encode($budget) . "' WHERE `id` = " . Flight::db()->real_escape_string($_POST['project_id']));
            if ($project) {
                Flight::db()->commit();
                echo json_encode([
                    "status" => 1
                ]);
            } else {
                throw new Exception('failed to update project.');
            }
        } catch (\Exception $e) {
            echo json_encode([
                "status" => 0
            ]);
        }
    }

    public function edit_project()
    {
        if(!isset($_GET["project"]) || empty($_GET["project"])) {
            header("Location: /cms/projects/projects/project_list");
            die();
        }
        $project_query = Flight::db()->query("SELECT `id`, `client_id`, `contact_id`, `project_no`, `title`, `start_date`, `status`, `description`, `right_and_usage`, `budget`, `is_archive`, `rights_and_usage_extension`, `extension_start_date` FROM `projects` WHERE id = " . $_GET["project"]);
        $project = $project_query->fetch_assoc();
        if(empty($project)) {
            header("Location: /cms/projects/projects/project_list");
            die();
        }

        $selections = [];
        $selection_query = Flight::db()->query("SELECT selecties.code, selecties.creation_date, selecties.id, selecties.name, (select COUNT(id_model) from selecties_models where selecties_models.id_selectie = project_selections.selection_id ) as modal_count FROM `project_selections` inner join selecties on selecties.id = project_selections.selection_id WHERE project_selections.project_id = " . $_GET["project"]);
        while ($row = $selection_query->fetch_assoc()) {
            array_push($selections, $row);
        }

        $clients = [];
        $contacts = [];
        $current_client_name = "";
        $current_client_id = "";
        $current_contact_name = "";
        $current_contact_id = "";
        $client_query = Flight::db()->query("SELECT `id`, `company_name` FROM `clients` ORDER BY `company_name` ASC");
        $count = 0;
        while ($row = $client_query->fetch_assoc()) {
            if(($row["id"] == $project["client_id"]) || $count == 0) {
                $current_client_id = $row["id"];
                $current_client_name = $row["company_name"];
            }
            array_push($clients, $row);
            $count++;
        }
        if(!empty($current_client_id)) {
            $contact_query = Flight::db()->query("SELECT `id`, `fname`, `lname` FROM `contacts` WHERE `client_id` = " . $current_client_id);
            while ($row = $contact_query->fetch_assoc()) {
                if(($row["id"] == $project["contact_id"]) || $count == 0) {
                    $current_contact_id = $row["id"];
                    $current_contact_name = $row["fname"] . " " . $row["lname"];
                }
                array_push($contacts, $row);
            }
        }
        $budget = json_decode($project["budget"] ?? "[]");
        $total_client = 0;
        $total_talent = 0;

        if(count($budget)) {
            foreach($budget as $b) {
                $total_client += ($b->day_fee + $b->client_rights + $b->client_travel + $b->client_agency);
                $total_talent += ($b->talent_fees + $b->talent_rights + $b->talent_travel);
            }
        }

        $this->smarty->assign('include_tabs', 'cms/projects/tabs.tpl');
        $this->smarty->assign('tab_active', '');
        $this->smarty->assign('clients', $clients);
        $this->smarty->assign('contacts', $contacts);
        $this->smarty->assign('current_contact_name', $current_contact_name);
        $this->smarty->assign('current_contact_id', $current_contact_id);
        $this->smarty->assign('current_client_name', $current_client_name);
        $this->smarty->assign('current_client_id', $current_client_id);
        $this->smarty->assign('current_project_id', $_GET['project']);
        $this->smarty->assign('project', $project);
        $this->smarty->assign('selections', $selections);
        $this->smarty->assign('budget', $budget);
        $this->smarty->assign('total_client', $total_client);
        $this->smarty->assign('total_talent', $total_talent);
        $this->smarty->assign('include', 'cms/projects/edit-project.tpl');
        $this->smarty->display('templates/cms/index-new.tpl');
    }

    public function edit_project_ajax()
    {
        if(!isset($_GET["project"]) || empty($_GET["project"])) {
            echo json_encode([
                "status" => 0
            ]);
        }
        $project_query = Flight::db()->query("SELECT `id`, `client_id`, `contact_id`, `project_no`, `title`, `start_date`, `status`, `description`, `right_and_usage`, `budget`, `is_archive`, `rights_and_usage_extension`, `extension_start_date` FROM `projects` WHERE id = " . $_GET["project"]);
        $project = $project_query->fetch_assoc();
        if(empty($project)) {
            echo json_encode([
                "status" => 0,
                "message" => "Project not found"
            ]);
        }

        $selections = [];
        $selection_query = Flight::db()->query("SELECT selecties.code, selecties.creation_date, selecties.id, selecties.name, (select COUNT(id_model) from selecties_models where selecties_models.id_selectie = project_selections.selection_id ) as modal_count FROM `project_selections` inner join selecties on selecties.id = project_selections.selection_id WHERE project_selections.project_id = " . $_GET["project"]);
        while ($row = $selection_query->fetch_assoc()) {
            array_push($selections, $row);
        }

        $clients = [];
        $contacts = [];
        $current_client_name = "";
        $current_client_id = "";
        $current_contact_name = "";
        $current_contact_id = "";
        $client_query = Flight::db()->query("SELECT `id`, `company_name` FROM `clients` where `is_archive` = 0 ORDER BY `company_name` ASC");
        $count = 0;
        while ($row = $client_query->fetch_assoc()) {
            if(($row["id"] == $project["client_id"]) || $count == 0) {
                $current_client_id = $row["id"];
                $current_client_name = $row["company_name"];
            }
            array_push($clients, $row);
            $count++;
        }
        if(!empty($current_client_id)) {
            $contact_query = Flight::db()->query("SELECT `id`, `fname`, `lname` FROM `contacts` WHERE `client_id` = " . $current_client_id);
            while ($row = $contact_query->fetch_assoc()) {
                if(($row["id"] == $project["contact_id"]) || $count == 0) {
                    $current_contact_id = $row["id"];
                    $current_contact_name = $row["fname"] . " " . $row["lname"];
                }
                array_push($contacts, $row);
            }
        }
        $budget = json_decode($project["budget"] ?? "[]");
        $total_client = 0;
        $total_talent = 0;

        if(count($budget)) {
            foreach($budget as $b) {
                $total_client += ($b->day_fee + $b->client_rights + $b->client_travel + $b->client_agency);
                $total_talent += ($b->talent_fees + $b->talent_rights + $b->talent_travel);
            }
        }

        echo json_encode([
            "status" => 1,
            'clients' => $clients,
            "contacts" => $contacts,
            "current_contact_name" => $current_contact_name,
            "current_contact_id" => $current_contact_id,
            "current_client_name" => $current_client_name,
            "current_client_id" => $current_client_id,
            "current_project_id" => $_GET['project'],
            "project" => $project,
            "selections" => $selections,
            "budget" => $budget,
            "total_client" => $total_client,
            "total_talent" => $total_talent,
        ]);
    }

    public function project_list()
    {
        $projects = [];
        $project_query = Flight::db()->query("SELECT projects.id, projects.client_id, projects.project_no, projects.title, projects.status, clients.company_name FROM projects INNER JOIN clients ON projects.client_id = clients.id where projects.is_archive = 0 ORDER BY projects.id DESC");
        while ($row = $project_query->fetch_assoc()) {

            $selections = [];
            $selection_query = Flight::db()->query("SELECT selecties.name, (select COUNT(id_model) from selecties_models where selecties_models.id_selectie = project_selections.selection_id ) as modal_count FROM `project_selections` inner join selecties on selecties.id = project_selections.selection_id WHERE project_selections.project_id = " . $row["id"]);
            while ($row1 = $selection_query->fetch_assoc()) {
                array_push($selections, $row1);
            }
            $row["selections"] = $selections;
            array_push($projects, $row);
        }
        $this->smarty->assign('include_tabs', 'cms/projects/tabs.tpl');
        $this->smarty->assign('tab_active', 'project_list');
        $this->smarty->assign('projects', $projects);
        $this->smarty->assign('include', 'cms/projects/project-list.tpl');
        $this->smarty->display('templates/cms/index-new.tpl');
    }
    public function archive()
    {
        $projects = [];
        $project_query = Flight::db()->query("SELECT projects.id, projects.client_id, projects.project_no, projects.title, projects.status, clients.company_name FROM projects INNER JOIN clients ON projects.client_id = clients.id where projects.is_archive = 1");
        while ($row = $project_query->fetch_assoc()) {
            $selections = [];
            $selection_query = Flight::db()->query("SELECT selecties.name, (select COUNT(id_model) from selecties_models where selecties_models.id_selectie = project_selections.selection_id ) as modal_count FROM `project_selections` inner join selecties on selecties.id = project_selections.selection_id WHERE project_selections.project_id = " . $row["id"]);
            while ($row1 = $selection_query->fetch_assoc()) {
                array_push($selections, $row1);
            }
            $row["selections"] = $selections;
            array_push($projects, $row);
        }
        $this->smarty->assign('include_tabs', 'cms/projects/tabs.tpl');
        $this->smarty->assign('tab_active', 'archive');
        $this->smarty->assign('projects', $projects);
        $this->smarty->assign('include', 'cms/projects/archive.tpl');
        $this->smarty->display('templates/cms/index-new.tpl');
    }

    public function projects_ajax()
    {
        $projects = [];
        $project_query = Flight::db()->query("SELECT `id`, `client_id`, `contact_id`, `project_no`, `title`, `start_date`, `status`, `description`, `right_and_usage`, `budget`, `is_archive` FROM `projects` WHERE `client_id` = " . $_GET["client_id"] ." AND is_archive = 0 ");
        while ($row = $project_query->fetch_assoc()) {
            array_push($projects, $row);
        }
        echo json_encode($projects);
    }
}


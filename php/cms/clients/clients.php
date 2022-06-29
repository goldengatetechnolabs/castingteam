<?php

class Clients extends Core_Controller
{
    /**
     * @param Account_Admin $account
     */
    public function __construct(Account_Admin $account)
    {
        parent::__construct($account);

        $this->smarty->assign('hoofdmenu_actief', 'clients');
    }
    public function create_client()
    {
        $this->smarty->assign('include_tabs', 'cms/clients/tabs.tpl');
        $this->smarty->assign('tab_active', 'create_client');
        $this->smarty->assign('include', 'cms/clients/create-client.tpl');
        $this->smarty->display('templates/cms/index-new.tpl');
    }

    public function store_client()
    {
        Flight::db()->begin_transaction();

        try {
            $client = Flight::db()->query("INSERT INTO `clients`(`company_name`, `client_type`, `website`, `street`, `postal_code`, `city`, `country`, `vat_number`, `booker`, `status`) 
            VALUES ('" . Flight::db()->real_escape_string($_POST['company_name']) . "',
            '" . Flight::db()->real_escape_string($_POST['type']) . "',
            '" . Flight::db()->real_escape_string($_POST['website']) . "',
            '" . Flight::db()->real_escape_string($_POST['street']) . "',
            '" . Flight::db()->real_escape_string($_POST['postal_code']) . "',
            '" . Flight::db()->real_escape_string($_POST['city']) . "',
            '" . Flight::db()->real_escape_string($_POST['country']) . "',
            '" . Flight::db()->real_escape_string($_POST['vat-number']) . "',
            '" . Flight::db()->real_escape_string($_POST['booker']) . "',
            '" . Flight::db()->real_escape_string($_POST['status']) . "')");
            if ($client) {
                $client_id = Flight::db()->insert_id;
                $contacts = $_POST["contact"];
                if (!empty($contacts) && count($contacts)) {
                    foreach ($contacts as $contact) {

                        $fname = Flight::db()->real_escape_string($contact['fname']);
                        $lname = Flight::db()->real_escape_string($contact['lname']);
                        $email = Flight::db()->real_escape_string($contact['email']);
                        $phone_code = Flight::db()->real_escape_string($contact['phone_code']);
                        $phone_number = Flight::db()->real_escape_string($contact['phone_number']);
                        $password = Flight::db()->real_escape_string($contact['password']);
                        $language = Flight::db()->real_escape_string($contact['language']);
                        $contact_status = Flight::db()->real_escape_string($contact['contact_status']);

                        if (
                            !empty($fname) &&
                            !empty($lname) &&
                            !empty($email) &&
                            !empty($phone_code) &&
                            !empty($phone_number) &&
                            !empty($password) &&
                            !empty($language) &&
                            !empty($contact_status)
                        ) {

                            $client = Flight::db()->query("INSERT INTO `contacts`(`client_id`, `fname`, `lname`, `email`, `phone_code`, `phone_number`, `password`, `language`, `status`) 
                            VALUES (" . $client_id . ",
                            '" . $fname . "',
                            '" . $lname . "',
                            '" . $email . "',
                            '" . $phone_code . "',
                            '" . $phone_number . "',
                            '" . $password . "',
                            '" . $language . "',
                            '" . $contact_status . "')");

                        }
                    }
                }
                Flight::db()->commit();
                echo json_encode([
                    "status" => 1,
                    "msg" => "Client Added."
                ]);
            } else {
                throw new Exception('failed to add client.');
            }
        } catch (\Exception $e) {
            echo json_encode([
                "status" => 0,
                "error_msg" => $e->getMessage()
            ]);
        }
    }

    public function update_client()
    {
        Flight::db()->begin_transaction();

        try {
            $client = Flight::db()->query("UPDATE `clients` SET 
            `company_name`='" . Flight::db()->real_escape_string($_POST['company_name']) . "',
            `client_type`='" . Flight::db()->real_escape_string($_POST['type']) . "',
            `website`='" . Flight::db()->real_escape_string($_POST['website']) . "',
            `street`='" . Flight::db()->real_escape_string($_POST['street']) . "',
            `postal_code`='" . Flight::db()->real_escape_string($_POST['postal_code']) . "',
            `city`='" . Flight::db()->real_escape_string($_POST['city']) . "',
            `country`='" . Flight::db()->real_escape_string($_POST['country']) . "',
            `vat_number`='" . Flight::db()->real_escape_string($_POST['vat_number']) . "',
            `booker`='" . Flight::db()->real_escape_string($_POST['booker']) . "',
            `status`='" . Flight::db()->real_escape_string($_POST['status']) . "'
            WHERE `id`=" . Flight::db()->real_escape_string($_POST['client_id']));
            if ($client) {
                $contacts = $_POST["contact"];
                if (!empty($contacts) && count($contacts)) {
                    Flight::db()->query("DELETE FROM `contacts` WHERE `client_id` = " . Flight::db()->real_escape_string($_POST['client_id']));
                    foreach ($contacts as $contact) {

                        $fname = Flight::db()->real_escape_string($contact['fname']);
                        $lname = Flight::db()->real_escape_string($contact['lname']);
                        $email = Flight::db()->real_escape_string($contact['email']);
                        $phone_code = Flight::db()->real_escape_string($contact['phone_code']);
                        $phone_number = Flight::db()->real_escape_string($contact['phone_number']);
                        $password = Flight::db()->real_escape_string($contact['password']);
                        $language = Flight::db()->real_escape_string($contact['language']);
                        $contact_status = Flight::db()->real_escape_string($contact['contact_status']);

                        if (
                            !empty($fname) &&
                            !empty($lname) &&
                            !empty($email) &&
                            !empty($phone_code) &&
                            !empty($phone_number) &&
                            !empty($password) &&
                            !empty($language) &&
                            !empty($contact_status)
                        ) {

                            $client = Flight::db()->query("INSERT INTO `contacts`(`client_id`, `fname`, `lname`, `email`, `phone_code`, `phone_number`, `password`, `language`, `status`) 
                            VALUES (" . Flight::db()->real_escape_string($_POST['client_id']) . ",
                            '" . $fname . "',
                            '" . $lname . "',
                            '" . $email . "',
                            '" . $phone_code . "',
                            '" . $phone_number . "',
                            '" . $password . "',
                            '" . $language . "',
                            '" . $contact_status . "')");

                        }
                    }
                }
                Flight::db()->commit();
                echo json_encode([
                    "status" => 1,
                    "msg" => "Client Updated."
                ]);
            } else {
                throw new Exception('failed to update client.');
            }
        } catch (\Exception $e) {
            echo json_encode([
                "status" => 0,
                "error_msg" => $e->getMessage()
            ]);
        }
    }

    public function archive_client()
    {
        Flight::db()->begin_transaction();

        try {
            $client = Flight::db()->query("UPDATE `clients` SET  `is_archive`=1 WHERE `id`=" . Flight::db()->real_escape_string($_POST['id']));
            if ($client) {
                Flight::db()->commit();
                echo json_encode([
                    "status" => 1,
                    "msg" => "Client Archived."
                ]);
            } else {
                throw new Exception('failed to archive client.');
            }
        } catch (\Exception $e) {
            echo json_encode([
                "status" => 0,
                "error_msg" => $e->getMessage()
            ]);
        }
    }

    public function unarchive_client()
    {
        Flight::db()->begin_transaction();

        try {
            $client = Flight::db()->query("UPDATE `clients` SET  `is_archive`=0 WHERE `id`=" . Flight::db()->real_escape_string($_POST['id']));
            if ($client) {
                Flight::db()->commit();
                echo json_encode([
                    "status" => 1,
                    "msg" => "Client Unarchived."
                ]);
            } else {
                throw new Exception('failed to unarchive client.');
            }
        } catch (\Exception $e) {
            echo json_encode([
                "status" => 0,
                "error_msg" => $e->getMessage()
            ]);
        }
    }

    public function client_list()
    {
        $clients = [];
        $client_query = Flight::db()->query("SELECT `id`, `company_name` FROM `clients` WHERE `status` = 'Client' AND is_archive = 0 ORDER BY `company_name` ASC ");
        while ($row = $client_query->fetch_assoc()) {
            array_push($clients, $row);
        }
        $this->smarty->assign('include_tabs', 'cms/clients/tabs.tpl');
        $this->smarty->assign('tab_active', 'client_list');
        $this->smarty->assign('filter', $_GET["filter"] ?? "");
        $this->smarty->assign('clients', $clients);
        $this->smarty->assign('include', 'cms/clients/client-list.tpl');
        $this->smarty->display('templates/cms/index-new.tpl');
    }

    public function filter_client()
    {
        $clients = [];
        $condition = "WHERE is_archive = 0 AND ";
        if (!empty($_GET["alpha"]) && $_GET["alpha"] != "All") {
            $condition .= "(";
            if ($_GET["alpha"] == "0-9") {
                foreach ([0, 1, 2, 3, 4, 5, 6, 7, 8, 9] as $key => $number) {
                    $condition .= (($key) ? " OR " : "") . "  `company_name` LIKE '" . $number . "%' ";
                }
            } else {
                $condition .= "`company_name` LIKE '" . $_GET["alpha"] . "%'";
            }
            $condition .= ")";
        }
        if (!empty($_GET["alpha"]) && $_GET["alpha"] != "All" && !empty($_GET["status"])) {
            $condition .= " AND ";
        }
        if (!empty($_GET["status"]) && $_GET["status"]) {
            $condition .= " (`status` = '" . $_GET["status"] . "')";
        }
        $client_query = Flight::db()->query("SELECT `id`, `company_name` FROM `clients` " . $condition . " ORDER BY `company_name` ASC");
        while ($row = $client_query->fetch_assoc()) {
            array_push($clients, $row);
        }
        echo json_encode($clients);
    }

    public function archive_filter_client()
    {
        $clients = [];
        $condition = "WHERE is_archive = 1 AND ";
        if (!empty($_GET["alpha"]) && $_GET["alpha"] != "All") {
            $condition .= "(";
            if ($_GET["alpha"] == "0-9") {
                foreach ([0, 1, 2, 3, 4, 5, 6, 7, 8, 9] as $key => $number) {
                    $condition .= (($key) ? " OR " : "") . "  `company_name` LIKE '" . $number . "%' ";
                }
            } else {
                $condition .= "`company_name` LIKE '" . $_GET["alpha"] . "%'";
            }
            $condition .= ")";
        }
        if (!empty($_GET["alpha"]) && $_GET["alpha"] != "All" && !empty($_GET["status"])) {
            $condition .= " AND ";
        }
        if (!empty($_GET["status"]) && $_GET["status"]) {
            $condition .= " (`status` = '" . $_GET["status"] . "')";
        }
        $client_query = Flight::db()->query("SELECT `id`, `company_name` FROM `clients` " . $condition . " ORDER BY `company_name` ASC");
        while ($row = $client_query->fetch_assoc()) {
            array_push($clients, $row);
        }
        echo json_encode($clients);
    }

    public function get_client()
    {
        $contacts = [];
        $projects = [];
        $response = ["status" => 0, "error_msg" => "Client not found"];
        if(isset($_GET['id']) && !empty($_GET['id'])) {
            $client_query = Flight::db()->query("SELECT `id`, `company_name`, `client_type`, `website`, `street`, `postal_code`, `city`, `country`, `vat_number`, `booker`, `status` FROM `clients` WHERE `id` = " . $_GET['id']);
            $contact_query = Flight::db()->query("SELECT `id`, `client_id`, `fname`, `lname`, `email`, `phone_code`, `phone_number`, `password`, `language`, `status` FROM `contacts` WHERE `client_id` = " . $_GET['id']);
            while ($row = $contact_query->fetch_assoc()) {
                array_push($contacts, $row);
            }
            $project_query = Flight::db()->query("SELECT projects.id, projects.client_id, projects.project_no, projects.title, projects.status, clients.company_name FROM projects INNER JOIN clients ON projects.client_id = clients.id where projects.is_archive = 0 AND client_id = " . $_GET['id']);
            while ($row = $project_query->fetch_assoc()) {
                $selections = [];
                $selection_query = Flight::db()->query("SELECT selecties.name, selecties.creation_date, selecties.code, selecties.id, (select COUNT(id_model) from selecties_models where selecties_models.id_selectie = project_selections.selection_id ) as modal_count FROM `project_selections` inner join selecties on selecties.id = project_selections.selection_id WHERE project_selections.project_id = " . $row["id"]);
                while ($row1 = $selection_query->fetch_assoc()) {
                    array_push($selections, $row1);
                }
                $row["selections"] = $selections;
                array_push($projects, $row);
            }
            $response = ["status" => 1, "client" => $client_query->fetch_assoc(), "contacts" => $contacts, "projects" => $projects];
        }
        echo json_encode($response);
    }

    public function get_contacts()
    {
        $contacts = [];
        if(isset($_GET['id']) && !empty($_GET['id'])) {
            $contact_query = Flight::db()->query("SELECT `id`, `fname`, `lname` FROM `contacts` WHERE `client_id` = " . $_GET['id']);
            while ($row = $contact_query->fetch_assoc()) {
                array_push($contacts, $row);
            }
            $response = ["status" => 1, "contacts" => $contacts];
        }
        echo json_encode($response);
    }

    public function create_inquiry()
    {
        $this->smarty->assign('include_tabs', 'cms/clients/tabs.tpl');
        $this->smarty->assign('tab_active', 'create_inquiry');
        $this->smarty->assign('include', 'cms/clients/create-inquiry.tpl');
        $this->smarty->display('templates/cms/index-new.tpl');
    }
    public function inquiry_list()
    {
        $this->smarty->assign('include_tabs', 'cms/clients/tabs.tpl');
        $this->smarty->assign('hoofdmenu_actief', 'inquiry_list');
        $this->smarty->assign('tab_active', 'inquiry_list');
        $this->smarty->assign('include', 'cms/clients/inquiry-list.tpl');
        $this->smarty->display('templates/cms/index-new.tpl');
    }
    public function inquiry_detail()
    {
        $this->smarty->assign('include_tabs', 'cms/clients/tabs.tpl');
        $this->smarty->assign('tab_active', 'inquiry_list');
        $this->smarty->assign('include', 'cms/clients/inquiry-detail.tpl');
        $this->smarty->display('templates/cms/index-new.tpl');
    }
    public function archive()
    {
        $clients = [];
        $client_query = Flight::db()->query("SELECT `id`, `company_name` FROM `clients` WHERE is_archive = 1 ORDER BY `company_name` ASC ");
        while ($row = $client_query->fetch_assoc()) {
            array_push($clients, $row);
        }
        $this->smarty->assign('include_tabs', 'cms/clients/tabs.tpl');
        $this->smarty->assign('filter', $_GET["filter"] ?? "");
        $this->smarty->assign('clients', $clients);
        $this->smarty->assign('tab_active', 'archive');
        $this->smarty->assign('include', 'cms/clients/archive.tpl');
        $this->smarty->display('templates/cms/index-new.tpl');
    }

    public function clients_ajax()
    {
        $clients = [];
        $client_query = Flight::db()->query("SELECT `id`, `company_name` FROM `clients` WHERE is_archive = 0 ORDER BY `company_name` ASC ");
        while ($row = $client_query->fetch_assoc()) {
            array_push($clients, $row);
        }
        echo json_encode($clients);
    }
}

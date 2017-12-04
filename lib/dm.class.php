<?php
define('DEMO_LIMIT_ROW', 10);

class Dm
{
    var $db;

    function __construct($db)
    {
        $this->db = $db;
    }

    function dmPaginator($counter, $current_page, $offset = DEMO_LIMIT_ROW)
    {
        $paginator = new Paginator();

        $paginator->setTotalItemsCount($counter);
        $paginator->setItemCountPerPage($offset);
        $paginator->setCurrentPageNumber($current_page);
        $paginator->setPageRange(6);

        $items_count_per_page = $paginator->getItemCountPerPage();
        $current_page_number = $paginator->getCurrentPageNumber();
        $total_items_count = $paginator->getTotalItemsCount();

        $end = $items_count_per_page * $current_page_number;
        $start = ($end - $items_count_per_page) + 1;
        $end = ($end > $total_items_count) ? $total_items_count : $end;

        return array(
            'has_next_page' => $paginator->hasNext(),
            'items_count_per_page' => $items_count_per_page,
            'current_page_number' => (int)$current_page_number,
            'total_pages_count' => (int)$paginator->count(),
            'total_items_count' => (int)$total_items_count,
            'offset' => array('start' => (int)$start, 'end' => (int)$end)
        );
    }

    function search_by_id($sysid){
        $query = sprintf('select * from idx_property_active where sysid = %d', $sysid);
        $row = $this->db->row($query);
        return $row;
    }

    function add() {
        if(array_key_exists('action', $_POST) && $_POST['action'] == 'add') {
            $query = 'insert  into idx_property_active (address_short, address_large, price) values("%s", "%s", %d); ';
            $queryadd = sprintf($query, $_POST['address_short'], addslashes($_POST['address_large']), (int)$_POST['price']);
            $this->db->query($queryadd);
            $msg = '<div class="alert alert-success"><strong>Success!</strong> Indicates a successful or positive action. </div>';
            return $msg ;
        }
    }

    function edit() {
        if(array_key_exists('action', $_POST) && $_POST['action'] == 'edit') {
            $query = 'update idx_property_active set address_short="%s" , address_large="%s" , price= %d where sysid = %d ';
            $qupdate = sprintf($query, $_POST['address_short'], addslashes($_POST['address_large']), (int)$_POST['price'], $_POST['id']);
            $this->db->query($qupdate);
            $msg = '<div class="alert alert-success"><strong>Success!</strong> Update item. </div>';
            return $msg;
        }
    }
    function delete($code)
    {
        $qformat = sprintf('DELETE FROM idx_property_active WHERE sysid="%s"', $code);
        $qdelete = sprintf($qformat, $_POST['sysid']);
        $this->db->query($qdelete);
     //  echo '<div class="alert alert-danger"><strong>Danger!</strong> Property Delete MLS: ' . $code . ' </div>';
    }

    function listing()
    {
        global $db;
        $query = 'select count(id) as total from idx_property_active';
        $row = $db->row($query);
        $counter = $row['total'];
        $current_page = ((int)$_GET['page'] > 0) ? (int)$_GET['page'] : 1;

        $offset_limit = ($current_page - 1) * DEMO_LIMIT_ROW;

        $qformat = 'select sysid, mls_num, price, address_short, address_large from idx_property_active limit %d, %d';
        $query = sprintf($qformat, $offset_limit, DEMO_LIMIT_ROW);

        $results = $db->query($query);
        $paginator = $this->dmPaginator($counter, $current_page);

        $data = array(
            'paginator' => $paginator,
            'items' => $results
        );
        return $data;
    }


}
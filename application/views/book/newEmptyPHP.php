<?php

class Invoices extends Front_end_ar {

    public function __construct() {
        parent::__construct();
        $this->load->model('Get_by_language');

        $this->load->model('Invoice_model');
    }

    public function index() {
        $order_type = $this->input->get("order_type");
        if ($order_type == "b") {

            $title = "مشتريات";
        } elseif ($order_type == "s") {
            $title = "مبيعات";
        } elseif ($order_type == "mb") {
            $title = "مردود مشتريات";
        } else {

            $title = " مردود مبيعات";
        }
        $data['title'] = $title;
        $data['order_type'] = $order_type;
        /* $data['product']=$this->Invoice_model->get_all_products(); */


        $this->layout->view('website_ar/invoices/add_invoices_view_ar', $data);
    }

    public function view_invoice() {

        $order_type = $this->input->get("order_type");

        if ($order_type == "b") {

            $title = "مشتريات";
        } elseif ($order_type == "s") {
            $title = "مبيعات";
        } elseif ($order_type == "mb") {
            $title = "مردود مشتريات";
        } else {

            $title = " مردود مبيعات";
        }


        if (($order_type == "b") || ($order_type == "mb")) {

            $data['title'] = $title;
            $data['order_type'] = $order_type;
            $data['result'] = $this->Invoice_model->view_invoice_suppliers($order_type);

            $this->layout->view("website_ar/invoices/view_invoice_suppliers_view_ar", $data);
        } else {
            $data['title'] = $title;
            $data['order_type'] = $order_type;
            $data['result'] = $this->Invoice_model->view_invoice_clients($order_type);

            $this->layout->view("website_ar/invoices/view_invoice_view_ar", $data);
        }
    }

    public function create_invoice() {
        if ($this->input->post("order_date")) {
            $order_type = $this->input->post("order_type");



            $order_receiver_name = $this->input->post("order_receiver_name");
            $order_total_after_tax = 0;

            if ($order_type == "b" || $order_type == "mb") {

                $sql = "select * from suppliers where supplier_name ='" . $order_receiver_name . "'";
                $query = $this->db->query($sql);
                $result = $query->row();
            } else {

                $sql = "select * from clients  where client_name='" . $order_receiver_name . "'";
                $query = $this->db->query($sql);
                $result = $query->row();
            }



            $data = array(
                'order_no' => $this->input->post("order_no"),
                'order_date' => $this->input->post("order_date"),
                'order_receiver_name' => $result->id,
                'order_receiver_address' => $this->input->post("order_receiver_address"),
                'payment_method' => $this->input->post("payment_method"),
                'order_total_after_tax' => $order_total_after_tax,
                'order_datetime' => date("Y-m-d"),
                'order_type' => $order_type
            );
            $this->db->insert('tbl_order', $data);
            $order_id = $this->db->insert_id();
        }

        for ($count = 0; $count < $_POST["total_item"]; $count++) {
            $item_name = trim($_POST["item_name"][$count]);

            $sql = "select * from product where product_name='" . $item_name . "'";
            $query = $this->db->query($sql);
            $result = $query->row();



            $order_total_after_tax = $order_total_after_tax + floatval(trim($_POST["order_item_final_amount"][$count]));
            $data = array(
                'order_id' => $order_id,
                'item_name' => $result->product_id,
                'order_item_quantity' => trim($_POST["order_item_quantity"][$count]),
                'order_item_price' => trim($_POST["order_item_price"][$count]),
                'order_item_actual_amount' => trim($_POST["order_item_actual_amount"][$count]),
                'order_item_tax1_rate' => trim($_POST["order_item_tax1_rate"][$count]),
                'order_item_tax1_amount' => trim($_POST["order_item_tax1_amount"][$count]),
                'order_item_final_amount' => floatval(trim($_POST["order_item_final_amount"][$count]))
            );

            $this->db->insert('tbl_order_item', $data);


            $sql = "select product_count from product where product_name='" . $item_name . "'";
            $query = $this->db->query($sql);
            $result = $query->row();

            $data_data1 = array(
                'product_count' => $result->product_count - trim($_POST["order_item_quantity"][$count]),
            );
            $data_data2 = array(
                'product_count' => $result->product_count + trim($_POST["order_item_quantity"][$count]),
            );
            $order_type = $this->input->post("order_type");
            switch ($order_type) {

                case "s":
                    $this->db->where('product_name', $item_name);
                    $this->db->update('product', $data_data1);
                    break;
                case "b":
                    $this->db->where('product_name', $item_name);
                    $this->db->update('product', $data_data2);
                    break;
                case "mb":
                    $this->db->where('product_name', $item_name);
                    $this->db->update('product', $data_data1);
                    break;
                case "ms":
                    $this->db->where('product_name', $item_name);
                    $this->db->update('product', $data_data2);
                    break;
            }
        }


        $data = array(
            'order_total_after_tax' => $order_total_after_tax,
            'order_id' => $order_id
        );


        $this->db->where('order_id', $order_id);
        $this->db->update('tbl_order', $data);


        $order_type = $this->input->post("order_type");
        $data['result'] = $this->Invoice_model->view_invoice($order_type);
        $data['order_type'] = $this->input->post("order_type");
        if (($order_type == "b") || ($order_type == "mb")) {


            $data['order_type'] = $order_type;
            $data['result'] = $this->Invoice_model->view_invoice_suppliers($order_type);

            $this->layout->view("website_ar/invoices/view_invoice_suppliers_view_ar", $data);
        } else {

            $data['order_type'] = $order_type;
            $data['result'] = $this->Invoice_model->view_invoice_clients($order_type);

            $this->layout->view("website_ar/invoices/view_invoice_view_ar", $data);
        }
    }

    public function edit_invoice() {
        $order_type = $this->input->get("order_type");
        $data['order_type'] = $order_type;
        $id = $this->input->get("id");
        $data['row'] = $this->Invoice_model->edit_invoice($id);
        $data['result_result'] = $this->Invoice_model->edit_invoice_items($id);
        $this->layout->view("website_ar/invoices/edit_invoice_view_ar", $data);
    }

    public function update_invoice() {

        $order_total_before_tax = 0;
        $order_total_tax1 = 0;
        $order_total_tax = 0;
        $order_total_after_tax = 0;
        $order_id = $this->input->post('order_id');
        $order_total_tax = $order_total_tax1;
        $this->db->where('order_id', $order_id);
        $this->db->delete('tbl_order_item');

        $order_type = $this->input->post("order_type");

        for ($count = 0; $count < $_POST["total_item"]; $count++) {

            $order_total_after_tax = $order_total_after_tax + trim($_POST["order_item_final_amount"][$count]);
            $item_name = trim($_POST["item_name"][$count]);

            $sql = "select * from product where product_name='" . $item_name . "'";
            $query = $this->db->query($sql);
            $result = $query->row();



            $data = array(
                'order_id' => $order_id,
                'item_name' => $result->product_id,
                'order_item_quantity' => trim($_POST["order_item_quantity"][$count]),
                'order_item_price' => trim($_POST["order_item_price"][$count]),
                'order_item_actual_amount' => trim($_POST["order_item_actual_amount"][$count]),
                'order_item_tax1_rate' => trim($_POST["order_item_tax1_rate"][$count]),
                'order_item_tax1_amount' => trim($_POST["order_item_tax1_amount"][$count]),
                'order_item_final_amount' => trim($_POST["order_item_final_amount"][$count]),
            );
            $this->db->where('order_id', $order_id);
            $this->db->insert('tbl_order_item', $data);

            $sql = "select product_count from product where product_name='" . $item_name . "'";
            $query = $this->db->query($sql);
            $result = $query->row();

            $data_data1 = array(
                'product_count' => $result->product_count - trim($_POST["order_item_quantity"][$count]),
            );
            $data_data2 = array(
                'product_count' => $result->product_count + trim($_POST["order_item_quantity"][$count]),
            );
            $order_type = $this->input->post("order_type");
            switch ($order_type) {

                case "s":
                    $this->db->where('product_name', $item_name);
                    $this->db->update('product', $data_data1);
                    break;
                case "b":
                    $this->db->where('product_name', $item_name);
                    $this->db->update('product', $data_data2);
                    break;
                case "mb":
                    $this->db->where('product_name', $item_name);
                    $this->db->update('product', $data_data1);
                    break;
                case "ms":
                    $this->db->where('product_name', $item_name);
                    $this->db->update('product', $data_data2);
                    break;
            }
        }
        $client_name = $this->input->post("client_name");

        $sql = "select * from clients where client_name='" . $client_name . "'";
        $query = $this->db->query($sql);
        $result = $query->row();


        $data = array(
            'order_total_after_tax' => $order_total_after_tax,
            'order_no' => $this->input->post("order_no"),
            'order_date' => $this->input->post("order_date"),
            'order_receiver_name' => $result->id,
            'order_receiver_address' => $this->input->post("order_receiver_address"),
            'order_datetime' => date("Y-m-d"),
            'order_type' => $order_type,
            'payment_method' => $this->input->post("payment_method"),
        );


        $this->db->where('order_id', $order_id);
        $this->db->update('tbl_order', $data);


        $order_type = $this->input->post("order_type");
        if ($order_type == "b") {

            $title = "مشتريات";
        } elseif ($order_type == "s") {
            $title = "مبيعات";
        } elseif ($order_type == "mb") {
            $title = "مردود مشتريات";
        } else {

            $title = " مردود مبيعات";
        }
        $data['title'] = $title;
        $data['order_type'] = $order_type;


        if (($order_type == "b") || ($order_type == "mb")) {


            $data['order_type'] = $order_type;
            $data['result'] = $this->Invoice_model->view_invoice_suppliers($order_type);

            $this->layout->view("website_ar/invoices/view_invoice_suppliers_view_ar", $data);
        } else {

            $data['order_type'] = $order_type;
            $data['result'] = $this->Invoice_model->view_invoice_clients($order_type);

            $this->layout->view("website_ar/invoices/view_invoice_view_ar", $data);
        }
    }

    public function delete_invoice() {




        $id = $this->input->get("id");
        $this->db->where('order_id', $id);
        $this->db->delete('tbl_order_item');
        $this->db->where('order_id', $id);
        $this->db->delete('tbl_order');
        $type = $this->input->post("type");
        $data['result'] = $this->Invoice_model->view_invoice($type);



        $this->layout->view("website_ar/invoices/view_invoice_view_ar", $data);
    }

    public function fund_account() {


        $sql1 = 'SELECT sum(order_total_after_tax) as total1  FROM tbl_order   where   (order_type= "ms" or order_type = "b" )  ';

        $query1 = $this->db->query($sql1);

        $result1 = $query1->row();
        if ($result1) {
            $result_result1 = $result1->total1;
        } else {
            $result_result1 = 0;
        }

        $sql2 = 'SELECT sum(order_total_after_tax) as total2  FROM tbl_order   where   (order_type= "mb" or order_type = "s" )   ';

        $query2 = $this->db->query($sql2);

        $result2 = $query2->row();
        if ($result2) {
            $result_result2 = $result2->total2;
        } else {
            $result_result2 = 0;
        }


        $total = $result_result2 - $result_result1;

        $data['total'] = $total;
        $this->layout->view("website_ar/invoices/view_fund_account_ar", $data);
    }

    public function auto_product() {
        $keyword = strval($_POST['query']);
        if (isset($keyword) && !empty($keyword)) {

            $search_param = "{$keyword}%";

            $data = $this->Invoice_model->auto_product($search_param);
            foreach ($data as $row) {
                $productResult[] = $row['product_name'];
            }
            echo json_encode($productResult);
        }
    }

    public function auto_supplier() {
        $keyword = strval($_POST['query']);
        if (isset($keyword) && !empty($keyword)) {

            $search_param = "{$keyword}%";

            $data = $this->Invoice_model->auto_supplier($search_param);
            foreach ($data as $row) {
                $supplierResult[] = $row['supplier_name'];
            }
            echo json_encode($supplierResult);
        }
    }

    public function auto_client() {
        $keyword = strval($_POST['query']);
        if (isset($keyword) && !empty($keyword)) {

            $search_param = "{$keyword}%";

            $data = $this->Invoice_model->auto_client($search_param);
            foreach ($data as $row) {
                $clientResult[] = $row['client_name'];
            }
            echo json_encode($clientResult);
        }
    }

    public function validate_count_product() {




        $item_name = $this->input->post('item_name');

        $sql = "select * from product where product_name='" . $item_name . "'";
        $query = $this->db->query($sql);
        $result = $query->row();


        $data = array(
            'resulte' => $result->product_count,
        );


        echo json_encode($data);
    }

    public function product_report() {
        $sql = "select * from product";
        $query = $this->db->query($sql);
        $result = $query->result();
        $num = $query->num_rows();
        $data['result'] = $result;
        $data['num'] = $num;
        $this->layout->view('website_ar/products/products_report_view_ar', $data);
    }

    public function client_report() {
        $sql = "select * from clients";
        $query = $this->db->query($sql);
        $result = $query->result();
        $num = $query->num_rows();
        $data['result'] = $result;
        $data['num'] = $num;
        $this->layout->view('website_ar/clients/clients_report_view_ar', $data);
    }

    public function ryad() {

        $this->layout->view("mypdf");
    }

    public function create_products() {

        $this->layout->view("website_ar/products/add_product_view_ar");
    }

    public function create_clients() {

        $this->layout->view("website_ar/clients/add_client_view_ar");
    }

    public function insert_products() {


        for ($count = 0; $count < $_POST["total_item"]; $count++) {

            $data = array(
                'product_name' => trim($_POST["item_name"][$count]),
                'product_count' => trim($_POST["item_quantity"][$count]),
                'product_price' => trim($_POST["item_price"][$count]),
            );

            $this->db->insert('product', $data);
        }


        redirect('ar/invoices/product_report');
    }

    public function insert_clients() {


        for ($count = 0; $count < $_POST["total_item"]; $count++) {

            $data = array(
                'client_name' => trim($_POST["client_name"][$count]),
                'client_dis' => trim($_POST["client_dis"][$count]),
            );
            $this->db->insert('clients', $data);
        }

        redirect('ar/invoices/client_report');
    }

    public function suppliers_report() {
        $sql = "select * from suppliers";
        $query = $this->db->query($sql);
        $result = $query->result();
        $num = $query->num_rows();
        $data['result'] = $result;
        $data['num'] = $num;
        $this->layout->view('website_ar/suppliers/suppliers_report_view_ar', $data);
    }

    public function insert_suppliers() {


        for ($count = 0; $count < $_POST["total_item"]; $count++) {

            $data = array(
                'supplier_name' => trim($_POST["supplier_name"][$count]),
                'supplier_dis' => trim($_POST["supplier_dis"][$count]),
            );

            $this->db->insert('suppliers', $data);
        }


        redirect('ar/invoices/suppliers_report');
    }

    public function create_suppliers() {

        $this->layout->view("website_ar/suppliers/add_supplier_view_ar");
    }

    public function create_client_payment() {

        $this->layout->view("website_ar/payments_client/add_payment_clients_view_ar");
    }

    public function create_supplier_payment() {

        $this->layout->view("website_ar/payments_supplier/add_payment_suppliers_view_ar");
    }

    public function insert_client_payments() {




        for ($count = 0; $count < $_POST["total_item"]; $count++) {
            $client_name = trim($_POST["client_name"][$count]);
            $sql = "select * from clients where client_name='" . $client_name . "'";
            $query = $this->db->query($sql);
            $result = $query->row();
            $data = array(
                'client_id' => $result->id,
                'payment_value' => trim($_POST["payment_value"][$count]),
            );
            $this->db->insert('payment', $data);
        }



        redirect('ar/invoices/clients_payment_report');
    }

    public function insert_supplier_payments() {


        for ($count = 0; $count < $_POST["total_item"]; $count++) {
            $supplier_name = trim($_POST["supplier_name"][$count]);
            $sql = "select * from suppliers where supplier_name='" . $supplier_name . "'";
            $query = $this->db->query($sql);
            $result = $query->row();

            $data = array(
                'supplier_id' => $result->id,
                'payment_value' => trim($_POST["payment_value"][$count]),
            );

            $this->db->insert('payment', $data);
        }


        redirect('ar/invoices/suppliers_payment_report');
    }

    public function suppliers_payment_report() {
        $sql = "select * from suppliers s,payment p where s.id=p.supplier_id ";
        $query = $this->db->query($sql);
        $result = $query->result();
        $num = $query->num_rows();
        $data['result'] = $result;
        $data['num'] = $num;
        $this->layout->view('website_ar/payments_supplier/payments_suppliers_report_view_ar', $data);
    }

    public function clients_payment_report() {
        $sql = "select * from clients c,payment p where c.id=p.client_id ";
        $query = $this->db->query($sql);
        $result = $query->result();
        $num = $query->num_rows();
        $data['result'] = $result;
        $data['num'] = $num;
        $this->layout->view('website_ar/payments_client/payments_clients_report_view_ar', $data);
    }

    public function clients_account() {


        $sql = "select cl.id,cl.client_name,((select IFNULL(sum(pa.payment_value),0)  
		from payment pa where pa.client_id=cl.id)-(select   IFNULL(sum(ord.order_total_after_tax),0) 
		from tbl_order ord where ord.order_receiver_name=cl.id and( ord.order_type='s' ) and ord.payment_method= 'آجل')+ 
		(select   IFNULL(sum(ord.order_total_after_tax),0) 
		from tbl_order ord where ord.order_receiver_name=cl.id and( ord.order_type= 'ms' ) and ord.payment_method= 'آجل' )  )
        as total from clients cl";

        $query = $this->db->query($sql);
        $result = $query->result();
        $data['result'] = $result;

        $this->layout->view('website_ar/clients_account/clients_account_view_ar', $data);
    }

    public function suppliers_account() {

        $sql = "select supp.id,supp.supplier_name,((select IFNULL(sum(pa.payment_value),0)  
		from payment pa where pa.supplier_id=supp.id)-(select   IFNULL(sum(ord.order_total_after_tax),0) 
		from tbl_order ord where ord.order_receiver_name=supp.id and( ord.order_type='b' ) and ord.payment_method= 'آجل')+ 
		(select   IFNULL(sum(ord.order_total_after_tax),0) 
		from tbl_order ord where ord.order_receiver_name=supp.id and( ord.order_type= 'mb' ) and ord.payment_method= 'آجل' )  )
        as total from suppliers supp";

        $query = $this->db->query($sql);
        $result = $query->result();
        $data['result'] = $result;


        $this->layout->view('website_ar/suppliers_account/suppliers_account_view_ar', $data);
    }

}

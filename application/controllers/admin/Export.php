<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Export extends CI_Controller{

	public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('Excel_generator');

    }

    //================================== Excel
    public function excel_brhv_enquiry(){
        $this->load->model("model_export");

        if(isset($_POST['submit'])){
        
        //proses simpan dilakukan
        $this->model_export->excel_brhv_enquiry($_POST);
        } 
    }

    public function excel_brhv_confirm(){
        $this->load->model("model_export");

        if(isset($_POST['submit'])){
        
        //proses simpan dilakukan
        $this->model_export->excel_brhv_confirm($_POST);
        } 
    }

    public function excel_bve_enquiry(){
        $this->load->model("model_export");

        if(isset($_POST['submit'])){
        
        //proses simpan dilakukan
        $this->model_export->excel_bve_enquiry($_POST);
        } 
    }

    public function excel_bve_confirm(){
        $this->load->model("model_export");

        if(isset($_POST['submit'])){
        
        //proses simpan dilakukan
        $this->model_export->excel_bve_confirm($_POST);
        } 
    }

    public function excel_bvo_enquiry(){
        $this->load->model("model_export");

        if(isset($_POST['submit'])){
        
        //proses simpan dilakukan
        $this->model_export->excel_bvo_enquiry($_POST);
        } 
    }

    public function excel_bvo_confirm(){
        $this->load->model("model_export");

        if(isset($_POST['submit'])){
        
        //proses simpan dilakukan
        $this->model_export->excel_bvo_confirm($_POST);
        } 
    }

    public function pdf_brhv_report($report_id, $villa, $guest_name) {   
        // Load all views as normal
        $this->load->model("model_export");

        $data['pdf'] = $this->model_export->pdf_brhv_report($report_id);
        $this->load->view('admin/balirealty/welcome_letter_brhv', $data);
        
        // Get output html
        $html = $this->output->get_output();
        
        // Load library
        $this->load->library('dompdf_gen');
        
        // Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream('Welcome Letter - '.$villa.' - '.$guest_name.'.pdf');
    }

    public function pdf_chart_villa_enquiry($villa) {   
        // Load all views as normal
        $this->load->model("model_get");

        $data['villa'] = $villa;

        $data['button_print_enquiry'] = base_url().'admin/export/pdf_chart_villa_enquiry';
        $data['button_print_booking'] = base_url().'admin/export/pdf_chart_villa_booking';
        $data['button_print_revenue'] = base_url().'admin/export/pdf_chart_villa_revenue';

        $this->load->view('admin/balirealty/pdf_chart_villa_enquiry', $data);
        
        // Get output html
        $html = $this->output->get_output();
        
        // Load library
        $this->load->library('dompdf_gen');
        
        // Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->set_paper("A4", "landscape");
        $this->dompdf->render();
        $this->dompdf->stream('Villa '.$villa.' - Enquiry Report.pdf');
    }

    public function pdf_chart_villa_booking($villa) {   
        // Load all views as normal
        $this->load->model("model_get");

        $data['villa'] = $villa;

        $data['button_print_enquiry'] = base_url().'admin/export/pdf_chart_villa_enquiry';
        $data['button_print_booking'] = base_url().'admin/export/pdf_chart_villa_booking';
        $data['button_print_revenue'] = base_url().'admin/export/pdf_chart_villa_revenue';

        $this->load->view('admin/balirealty/pdf_chart_villa_booking', $data);
        
        // Get output html
        $html = $this->output->get_output();
        
        // Load library
        $this->load->library('dompdf_gen');
        
        // Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->set_paper("A4", "landscape");
        $this->dompdf->render();
        $this->dompdf->stream('Villa '.$villa.' - Booking Report.pdf');
    }
}

/* End of file Data.php */
/* Location: ./application/controllers/Data.php */
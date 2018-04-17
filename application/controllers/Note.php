<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Note extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('note_model');
        $this->isLoggedIn();
    }

    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $this->global['pageTitle'] = 'StarVish: Note Master';
        $result=$this->note_model->notelisting();
        if($result!=false)
          {$res['datas']=$result;
            $res['searchText']='';
          }
        else {
          $res['datas']='NA';
          $res['searchText']='';
        }
        $html =$this->loadViews("note/note", $this->global, $res , NULL);
    }

    //this function used to redirect to addnote or editnote based on the id
      public function add_edit_note($id=NULL)
      {
        if($id==NULL)
        {
          $this->global['pageTitle'] = 'StarVish:Add Note';
        $this->loadViews("note/add_note", $this->global, NULL , NULL);
        }
        else {
          $this->global['pageTitle'] = 'StarVish:Edit Note';
          $result['datas']=$this->note_model->fetch_note($id);
          $this->loadViews("note/edit_note",$this->global,$result,NULL);
        }
      }

      //function for adding note
          public function add_note()
          {
            $description=$this->input->post('description');

            $data=array('description'=>$description);
              $result = FALSE;
              $result = $this->note_model->add_note($data);
              if($result == TRUE){
                  $this->session->set_flashdata('success', 'New Note created successfully');
              }
              else {
                $this->session->set_flashdata('error','Note creation Failed!');
              }

              redirect('add_edit_note');
          }

      //function for editing note Details
      public function update_note()
      {
        $id=$this->input->post('note_id');
        $description=$this->input->post('description');
        if($description=="") //check empty file input
        {
        $datas=array('id'=>$id);
        }
      else {
        $datas=array('description'=>$description);
      }
        $result = FALSE;
          $result = $this->note_model->update_note($id,$datas);
          if($result == true)
          {
              $this->session->set_flashdata('success', 'Note updated successfully');
          }
          else
          {
              $this->session->set_flashdata('error', 'Note updation failed!');
          }
          redirect('note_master');
      }

      //function to delete note data
      public function delete_note($id)
      {
        $result = $this->note_model->delete_note($id);
        if($result == true)
        {
            $this->session->set_flashdata('success', 'Note Deleted successfully');
        }
        else
        {
            $this->session->set_flashdata('error', 'Note Deletion failed!');
        }
        redirect('note_master');
      }
      //function to list the users based on the search result

      public function note_listing()
      {
        $this->global['pageTitle'] = 'StarVish: Search';
        $searchText = $this->security->xss_clean($this->input->post('searchText'));

        $result=$this->note_model->note_listing($searchText);
        if($result!=FALSE)
        {
          $data['datas']=$result;
          $data['searchText'] = $searchText;
        }
        else {
          $data['datas']='NA';
          $data['searchText'] = $searchText;
        }

      $this->loadViews("note/note",$this->global,$data,NULL);
      }

}
?>

<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;
use App\Models\PostModel;
use App\Models\ReplyModel; 

class Reply extends ResourceController
{
    public function __construct() {
        $this->userModel = new UserModel();
        $this->postModel = new PostModel();
        $this->replyModel = new ReplyModel();
        $this->session = session(); 
        helper('form');   
    }  

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $reply = $this->replyModel->find('id');
        $user = $this->userModel->find('id');
        $reply = $this->replyModel->paginate(5, 'reply');
       
        $data = [
            "reply" => $reply,
            "pager" => $this->replyModel->pager
        ];
        echo view('reply/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function view($id)
    {
        $id = $this->request->uri->getSegment(2);
        $db      = \Config\Database::connect();
        $builder = $db->table('post');
        $builder->select('user_name, post, created_at');
        $builder->where('id', $id);
        $query = $builder->get();
        /*
        $id = $this->request->uri->getSegment(2);
        $postModel = new PostModel();
        $post = $postModel->find($id);

        $userModel = new UserModel();
        $user = $userModel->find('name');

        $replyModel = new ReplyModel();
        $data=[
            'post' => $post,
            'user'=> $user,

        ];

       echo view('reply/view');*/
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        $post_id = $this->request->uri->getSegment(2);
        $postModel = new PostModel();
        $post = $postModel->find($post_id);

        $replyModel = new ReplyModel();
        $user = $this->userModel->find('id');
        $data=[
            'post' => $post,
            'replyModel' => $replyModel,
            'user' =>$user,
        ];

        echo view('reply/new', $data);
    }


    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $post_id = $this->request->uri->getSegment(2);
        $postModel = new PostModel();
        $post = $postModel->find($post_id);

        $replyModel = new ReplyModel();

        if($this->request->getPost())
        {
            $data = $this->request->getPost();
            
            
                $reply = new \App\Entities\Reply();

                $reply->fill($data);

                $replyModel->save($reply);

                $segments = ['todo', $post_id,'view'];

                $this->session->setFlashdata('success','Anda Berhasil Membuat Reply');

                return redirect()->to(base_url($segments));
            

            
        }
        
        return view('reply/new',[
            'post' => $post,
            'replyModel' => $replyModel
        ]);

        /*
        $post = $this->postModel->find('id');
        $user = $this->userModel->find('id');
        $post_id= $this->request->uri->getSegment(2);
        echo $this->request->uri->getSegment(2);
        
        $reply = $this->replyModel->find('id');
        $reply['post_id'] = $post_id;
        $post['id'] = $post_id;
            $data = [
                "reply" => $this->request->getPost('reply'),
                'user_id' => $this->request->getPost('user_id'),
                'user_name' => $this->request->getPost('user_name'),
                'post' => $post_id,
            ];


            $this->replyModel->insert($data);
            return redirect()->to('/reply/index');
            */
        }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    
    public function delete($id = null)
    {

        $id = $this->request->uri->getSegment(2);
        $id_thread = $this->request->uri->getSegment(3);

        $modelReply = new ReplyModel();

        $modelReply->delete($id);

        return redirect()->to('/todo');
    }

}
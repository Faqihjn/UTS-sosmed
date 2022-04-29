<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;
use App\Models\PostModel;
use App\Models\ReplyModel; 

class Todo extends ResourceController
{
    public function __construct() {
        $this->userModel = new UserModel();
        $this->postModel = new PostModel();
        $this->replyModel = new ReplyModel();
        $this->session = session();
    }  

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        /*$user = $this->userModel->find('id');
        $user_name = $this->userModel->find('name');
        */
        $post = $this->postModel->paginate(5, 'todo');
        
        $user = $this->postModel->find('id');

        $reply = $this->replyModel->find('id');
        $data = [
            "post" => $post,
            "pager" => $this->postModel->pager,
            "reply" => $reply,
        ];

        

        echo view('todo/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = NULL)
    {
        $id = $this->request->uri->getSegment(2);

        $postModel = new PostModel();
        $post = $postModel->find($id);

        $userModel = new UserModel();
        $user = $userModel->find($post['user_id']);

        $replyModel = new ReplyModel();
        $reply = $replyModel->select('reply.id, reply.reply, reply.created_at ,user.name,')
                    ->join('user','user.id=reply.user_id', 'left')
                    ->where('post_id',$id)
                    ->get();

        return view('todo/view',[
            'post' => $post,
            'user' => $user,
            'reply' => $reply,
        ]);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        echo view('todo/new');
    }

    public function reply()
    {
        $replyModel = new replyModel();
            $data = [
                "reply" => $this->request->getPost('reply'),
            ];


            $this->replyModel->insert($data);
            return redirect()->to('/todo');
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $user = $this->userModel->find('id');
        $postModel = new PostModel();
            $data = [
                "post" => $this->request->getPost('postingan'),
                'user_id' => $this->request->getPost('user_id'),
                'user_name' => $this->request->getPost('user_name'),
            ];


            $this->postModel->insert($data);
            return redirect()->to('/todo');
    }

    
    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $id = $this->request->uri->getSegment(2);

        $postModel = new PostModel();
        
        $postModel->delete($id);
        return redirect()->to('/todo');
    }

   
}
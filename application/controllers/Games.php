<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Games extends CI_Controller {
	public function index()
	{
        $this->load->model("games_model");
        $data['title'] = "Games";
        $data['games'] = $this->games_model->index();

		$this->load->view('templates/header', $data);
        $this->load->view('templates/nav-top', $data);
		$this->load->view('pages/games', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('templates/js', $data);
	}

    public function new()
	{
        $data['title'] = "New Game";

		$this->load->view('templates/header', $data);
        $this->load->view('templates/nav-top', $data);
		$this->load->view('pages/form-games', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('templates/js', $data);
	}


    public function store()
	{
        $game = $_POST;
        $game["user_id"] = '1';
        $this->load->model("games_model");
        $this->games_model->store($game);
        redirect("dashboard");
	}

    public function edit($id)
	{
        $this->load->model("games_model");
        $data['title'] = "Games";
        $data['game'] = $this->games_model->show($id);

		$this->load->view('templates/header', $data);
        $this->load->view('templates/nav-top', $data);
		$this->load->view('pages/form-games', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('templates/js', $data);
	}

    public function update($id)
    {
        $game = $_POST;
        $this->load->model("games_model");
        $this->games_model->update($id, $game);
        redirect("games");
    }

}

<?php
namespace JoshybaDev\EasyBroker;
class PaginatedResponse
{
    private Query $query;
    private $response=[];
    private $error=false;
    public function __construct(Query $query)
    {
        # code...
        $this->query=$query;   
        $this->response=$this->query->get();
        if(isset($this->response["error"]))
        $this->error=true;
    }
    public function error()
    {
        return $this->error;
    }
    public function response()
    {
        return $this->response;
    }
    public function content()
    {
        return isset($this->response["content"])?$this->response["content"]:[];
    }    
    public function pagination()
    {
        return isset($this->response["pagination"])?$this->response["pagination"]:[];
    }    
    public function total()
    {
        return isset($this->pagination()["total"])?$this->pagination()["total"]:1;
    }
    public function limit()
    {
        return $this->pagination()["limit"];
    }
    public function page()
    {
        return isset($this->pagination()["page"])?$this->pagination()["page"]:1;
    }
    public function select_page($page)
    {
        $this->response = $this->query->get($page);
        return $this->pagination()["page"];
    }    
    public function next_page()
    {
        if($this->page() * $this->limit() < $this->total())
        {
            $this->response = $this->query->get($this->page() + 1);
        }
        return $this->pagination()["page"];
    } 
    public function find_each()
    {
        return $this->response;
    } 
    public function each()
    {
        return $this->response;
    }
}
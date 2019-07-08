<?php
namespace App\Controller;

use App\Entity\Job;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


 // @ Route ("job") // add this if i want to add /job front of all this controller routs
 
class JobController extends AbstractController
{
    /**
     * @Route("/",name="job.list",methods="GET")
     * @return Response
     */
    function list(): Response{
        $jobs = $this->getDoctrine()->getRepository(Job::class)->findAll();
        return $this->render("job/list.html.twig", [
            "jobs" => $jobs,
        ]);
    }



    //in requirment section we add \d+ to ensure the id is numeric value
    /**
     * @Route("job/{id}",name="job.show",requirments=("id"="\d+"))
     * @param Jop $job
     * @return Response
     */
    public function show(Job $job): Response
    {
        return $this->render("job/show.html.twig", [
            "job" => $job,
        ]);
    }

}

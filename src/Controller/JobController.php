<?php
namespace App\Controller;

use App\Entity\Category;
use App\Entity\Job;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;


 // @ Route ("job") // add this if i want to add /job front of all this controller routs
 
class JobController extends AbstractController
{
    /**
     * @Route("/",name="job.list",methods="GET")
     * @return Response
     */
   function list(EntityManagerInterface $em): Response
   {
        
        $categories = $em->getRepository(Category::class)->findWithActiveJobs();

        return $this->render("job/list.html.twig", [
            "categories" => $categories,
        ]);
    }



    /**
     * in requirment section we add \d+ to ensure the id is numeric value
     * @Route("job/{id}", name="job.show",requirements={"id" = "\d+"})
     * @Entity("job", expr="repository.findActiveJob(id)")
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

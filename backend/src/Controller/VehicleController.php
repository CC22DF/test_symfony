<?php

namespace App\Controller;


use App\Entity\Vehicles;

use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VehicleController extends AbstractController
{
    #[Route('/vehicle', name: 'app_vehicle')]

    public function index(PaginatorInterface $paginator, EntityManagerInterface $manager, Request $request): Response
    {
        $data = $manager->getRepository(Vehicles::class)->findAll();

        $pagination = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1),
            12
        );

        foreach ($pagination as $Vehicle) {
            $cards[] = [
                'id' => $Vehicle->getId(),
                'brand' => $Vehicle->getBrand(),
                'model' => $Vehicle->getModel(),
                'version' => $Vehicle->getVersion(),
                'year' => $Vehicle->getYear(),
                'energy' => $Vehicle->getEnergy(),
                'power' => $Vehicle->getPower(),
                'price' => $Vehicle->getPrice(),
                'percentage' => $this->Percentage($Vehicle),
                'price_retail' => $Vehicle->getPriceRetail(),
                'price_monthly' => $Vehicle->getPriceMonthly(),
                'pics' => $Vehicle->getPics()
            ];
        }


        return $this->json(
             $cards,
        );
    }
    public function Percentage($data)
    {
        if ($data->getPriceRetail()) {
            $percentage = round((($data->getPrice() - $data->getPriceRetail()) / $data->getPriceRetail()) * 100, 0);
        } else {
            $percentage = 0;
        }
        return $percentage;
    }
    #[Route('/filterBrand', name: 'filter_brand')]
    public function filterBrand(Request $request, EntityManagerInterface $manager, PaginatorInterface $paginator)
    {
        //filter whit brand
        if ($request->get("brand")) {
            $data = $manager->getRepository(Vehicles::class)->findBy(['brand' => $request->get("brand")]);
            if ($data) {
                $cards = $data;
            } else {
                $cards = $manager->getRepository(Vehicles::class)->findAll();
            }
        } else {
            $cards = $manager->getRepository(Vehicles::class)->findAll();
        }
        $pagination = $paginator->paginate(
            $cards,
            $request->query->getInt('page', 1),
            12
        );

        foreach ($pagination as $card) {
            $cardss[] = [
                'id' => $card->getId(),
                'brand' => $card->getBrand(),
                'model' => $card->getModel(),
                'version' => $card->getVersion(),
                'year' => $card->getYear(),
                'energy' => $card->getEnergy(),
                'power' => $card->getPower(),
                'price' => $card->getPrice(),
                'percentage' => $this->Percentage($card),
                'price_retail' => $card->getPriceRetail(),
                'price_monthly' => $card->getPriceMonthly(),
                'mileage' => $card->getMileage(),
                'pics' => $card->getPics()
            ];
        }
        return $this->json([
            'vehicles' => $cardss,
        ]);
    }
    #[Route('/filterModel', name: 'filter_model')]
    public function filterModel(Request $request, EntityManagerInterface $manager, PaginatorInterface $paginator)
    {
        //filter whit model
        if ($request->get("model")) {
            $data = $manager->getRepository(Vehicles::class)->findBy(['model' => $request->get("model")]);
            if ($data) {
                $cards = $data;
            } else {
                $cards = $manager->getRepository(Vehicles::class)->findAll();
            }
        } else {
            $cards = $manager->getRepository(Vehicles::class)->findAll();
        }
        $pagination = $paginator->paginate(
            $cards,
            $request->query->getInt('page', 1),
            12
        );
        foreach ($pagination as $card) {
            $cardss[] = [
                'id' => $card->getId(),
                'brand' => $card->getBrand(),
                'model' => $card->getModel(),
                'version' => $card->getVersion(),
                'year' => $card->getYear(),
                'energy' => $card->getEnergy(),
                'power' => $card->getPower(),
                'price' => $card->getPrice(),
                'percentage' => $this->Percentage($card),
                'price_retail' => $card->getPriceRetail(),
                'price_monthly' => $card->getPriceMonthly(),
                'mileage' => $card->getMileage(),
                'pics' => $card->getPics()
            ];
        }
        return $this->json([
            'vehicles' => $cardss,
        ]);
    }
    #[Route('/filterVersion', name: 'filter_version')]
    public function filterVersion(Request $request, EntityManagerInterface $manager, PaginatorInterface $paginator)
    {
        //filter whit version
        if ($request->get("version")) {
            $data = $manager->getRepository(Vehicles::class)->findBy(['version' => $request->get("version")]);
            if ($data) {
                $cards = $data;
            } else {
                $cards = $manager->getRepository(Vehicles::class)->findAll();
            }
        } else {
            $cards = $manager->getRepository(Vehicles::class)->findAll();
        }
        $pagination = $paginator->paginate(
            $cards,
            $request->query->getInt('page', 1),
            12
        );
        foreach ($pagination as $card) {
            $cardss[] = [
                'id' => $card->getId(),
                'brand' => $card->getBrand(),
                'model' => $card->getModel(),
                'version' => $card->getVersion(),
                'year' => $card->getYear(),
                'energy' => $card->getEnergy(),
                'power' => $card->getPower(),
                'price' => $card->getPrice(),
                'percentage' => $this->Percentage($card),
                'price_retail' => $card->getPriceRetail(),
                'price_monthly' => $card->getPriceMonthly(),
                'mileage' => $card->getMileage(),
                'pics' => $card->getPics()
            ];
        }
        return $this->json([
            'vehicles' => $cardss,
        ]);
    }
    #[Route('/filterYear', name: 'filter_year')]
    public function filterYear(Request $request, EntityManagerInterface $manager, PaginatorInterface $paginator)
    {
        //filter whit version
        if ($request->get("year")) {
            $data = $manager->getRepository(Vehicles::class)->findBy(['year' => $request->get("year")]);
            if ($data) {
                $cards = $data;
            } else {
                $cards = $manager->getRepository(Vehicles::class)->findAll();
            }
        } else {
            $cards = $manager->getRepository(Vehicles::class)->findAll();
        }
        $pagination = $paginator->paginate(
            $cards,
            $request->query->getInt('page', 1),
            12
        );
        foreach ($pagination as $card) {
            $cardss[] = [
                'id' => $card->getId(),
                'brand' => $card->getBrand(),
                'model' => $card->getModel(),
                'version' => $card->getVersion(),
                'year' => $card->getYear(),
                'energy' => $card->getEnergy(),
                'power' => $card->getPower(),
                'price' => $card->getPrice(),
                'percentage' => $this->Percentage($card),
                'price_retail' => $card->getPriceRetail(),
                'price_monthly' => $card->getPriceMonthly(),
                'mileage' => $card->getMileage(),
                'pics' => $card->getPics()
            ];
        }
        return $this->json([
            'vehicles' => $cardss,
        ]);
    }
    #[Route('/filterEnergy', name: 'filter_energy')]
    public function filterEnergy(Request $request, EntityManagerInterface $manager, PaginatorInterface $paginator)
    {
        //filter whit version
        if ($request->get("energy")) {
            $data = $manager->getRepository(Vehicles::class)->findBy(['energy' => $request->get("energy")]);
            if ($data) {
                $cards = $data;
            } else {
                $cards = $manager->getRepository(Vehicles::class)->findAll();
            }
        } else {
            $cards = $manager->getRepository(Vehicles::class)->findAll();
        }
        $pagination = $paginator->paginate(
            $cards,
            $request->query->getInt('page', 1),
            12
        );
        foreach ($pagination as $card) {
            $cardss[] = [
                'id' => $card->getId(),
                'brand' => $card->getBrand(),
                'model' => $card->getModel(),
                'version' => $card->getVersion(),
                'year' => $card->getYear(),
                'energy' => $card->getEnergy(),
                'power' => $card->getPower(),
                'price' => $card->getPrice(),
                'percentage' => $this->Percentage($card),
                'price_retail' => $card->getPriceRetail(),
                'price_monthly' => $card->getPriceMonthly(),
                'mileage' => $card->getMileage(),
                'pics' => $card->getPics()
            ];
        }
        return $this->json([
            'vehicles' => $cardss,
        ]);
    }
    #[Route('/filterPower', name: 'filter_power')]
    public function filterPower(Request $request, EntityManagerInterface $manager, PaginatorInterface $paginator)
    {
        //filter whit version
        if ($request->get("power")) {
            $data = $manager->getRepository(Vehicles::class)->findBy(['power' => $request->get("power")]);
            if ($data) {
                $cards = $data;
            } else {
                $cards = $manager->getRepository(Vehicles::class)->findAll();
            }
        } else {
            $cards = $manager->getRepository(Vehicles::class)->findAll();
        }
        $pagination = $paginator->paginate(
            $cards,
            $request->query->getInt('page', 1),
            12
        );
        foreach ($pagination as $card) {
            $cardss[] = [
                'id' => $card->getId(),
                'brand' => $card->getBrand(),
                'model' => $card->getModel(),
                'version' => $card->getVersion(),
                'year' => $card->getYear(),
                'energy' => $card->getEnergy(),
                'power' => $card->getPower(),
                'price' => $card->getPrice(),
                'percentage' => $this->Percentage($card),
                'price_retail' => $card->getPriceRetail(),
                'price_monthly' => $card->getPriceMonthly(),
                'mileage' => $card->getMileage(),
                'pics' => $card->getPics()
            ];
        }
        return $this->json([
            'vehicles' => $cardss,
        ]);
    }
    #[Route('/filterPrice', name: 'filter_price')]
    public function filterPrice(Request $request, EntityManagerInterface $manager, PaginatorInterface $paginator)
    {
        //filter whit version
        if ($request->get("price")) {
            $data = $manager->getRepository(Vehicles::class)->findBy(['price' => $request->get("price")]);
            if ($data) {
                $cards = $data;
            } else {
                $cards = $manager->getRepository(Vehicles::class)->findAll();
            }
        } else {
            $cards = $manager->getRepository(Vehicles::class)->findAll();
        }
        $pagination = $paginator->paginate(
            $cards,
            $request->query->getInt('page', 1),
            12
        );
        foreach ($pagination as $card) {
            $cardss[] = [
                'id' => $card->getId(),
                'brand' => $card->getBrand(),
                'model' => $card->getModel(),
                'version' => $card->getVersion(),
                'year' => $card->getYear(),
                'energy' => $card->getEnergy(),
                'power' => $card->getPower(),
                'price' => $card->getPrice(),
                'percentage' => $this->Percentage($card),
                'price_retail' => $card->getPriceRetail(),
                'price_monthly' => $card->getPriceMonthly(),
                'mileage' => $card->getMileage(),
                'pics' => $card->getPics()
            ];
        }
        return $this->json([
            'vehicles' => $cardss,
        ]);
    }
    #[Route('/filterPriceRetail', name: 'filter_price_retail')]
    public function filterPriceRetail(Request $request, EntityManagerInterface $manager, PaginatorInterface $paginator)
    {
        //filter whit version
        if ($request->get("price_retail")) {
            $data = $manager->getRepository(Vehicles::class)->findBy(['price_retail' => $request->get("price_retail")]);
            if ($data) {
                $cards = $data;
            } else {
                $cards = $manager->getRepository(Vehicles::class)->findAll();
            }
        } else {
            $cards = $manager->getRepository(Vehicles::class)->findAll();
        }
        $pagination = $paginator->paginate(
            $cards,
            $request->query->getInt('page', 1),
            12
        );
        foreach ($pagination as $card) {
            $cardss[] = [
                'id' => $card->getId(),
                'brand' => $card->getBrand(),
                'model' => $card->getModel(),
                'version' => $card->getVersion(),
                'year' => $card->getYear(),
                'energy' => $card->getEnergy(),
                'power' => $card->getPower(),
                'price' => $card->getPrice(),
                'percentage' => $this->Percentage($card),
                'price_retail' => $card->getPriceRetail(),
                'price_monthly' => $card->getPriceMonthly(),
                'mileage' => $card->getMileage(),
                'pics' => $card->getPics()
            ];
        }
        return $this->json([
            'vehicles' => $cardss,
        ]);
    }
    #[Route('/filterPriceMonthly', name: 'filter_price_monthly')]
    public function filterPriceMonthly(Request $request, EntityManagerInterface $manager, PaginatorInterface $paginator)
    {
        //filter whit version
        if ($request->get("price_monthly")) {
            $data = $manager->getRepository(Vehicles::class)->findBy(['price_monthly' => $request->get("price_monthly")]);
            if ($data) {
                $cards = $data;
            } else {
                $cards = $manager->getRepository(Vehicles::class)->findAll();
            }
        } else {
            $cards = $manager->getRepository(Vehicles::class)->findAll();
        }
        $pagination = $paginator->paginate(
            $cards,
            $request->query->getInt('page', 1),
            12
        );
        foreach ($pagination as $card) {
            $cardss[] = [
                'id' => $card->getId(),
                'brand' => $card->getBrand(),
                'model' => $card->getModel(),
                'version' => $card->getVersion(),
                'year' => $card->getYear(),
                'energy' => $card->getEnergy(),
                'power' => $card->getPower(),
                'price' => $card->getPrice(),
                'percentage' => $this->Percentage($card),
                'price_retail' => $card->getPriceRetail(),
                'price_monthly' => $card->getPriceMonthly(),
                'mileage' => $card->getMileage(),
                'pics' => $card->getPics()
            ];
        }
        return $this->json([
            'vehicles' => $cardss,
        ]);
    }

    #[Route('/filterPriceSlider', name: 'price_slider')]
    public function filterPriceSlider(Request $request, EntityManagerInterface $manager, PaginatorInterface $paginator)
    {
        $minPrice = $request->get('minPrice');
        $maxPrice = $request->get('maxPrice');
        $query = $manager->getRepository(Vehicles::class)->createQueryBuilder('v')
            ->where('v.price BETWEEN :minPrice AND :maxPrice')
            ->setParameter('minPrice', $minPrice)
            ->setParameter('maxPrice', $maxPrice)
            ->getQuery();
        $vehicles = $query->getResult();
        $pagination = $paginator->paginate(
            $vehicles,
            $request->query->getInt('page', 1),
            12
        );
        foreach ($pagination as $card) {
            $cardss[] = [
                'id' => $card->getId(),
                'brand' => $card->getBrand(),
                'model' => $card->getModel(),
                'version' => $card->getVersion(),
                'year' => $card->getYear(),
                'energy' => $card->getEnergy(),
                'power' => $card->getPower(),
                'price' => $card->getPrice(),
                'percentage' => $this->Percentage($card),
                'price_retail' => $card->getPriceRetail(),
                'price_monthly' => $card->getPriceMonthly(),
                'mileage' => $card->getMileage(),
                'pics' => $card->getPics()
            ];
        }

        return $this->json([
            'vehicles' => $cardss,
        ]);
    }
    #[Route('/filterMileage', name: 'mileage')]
    public function filterMileage(Request $request, EntityManagerInterface $manager, PaginatorInterface $paginator)
    {
        $query = $manager->getRepository(Vehicles::class)->createQueryBuilder('v')
            ->where('v.mileage BETWEEN :zeroKM AND :maxKM')
            ->setParameter('zeroKM', 0)
            ->setParameter('maxKM', 150)
            ->getQuery();
        $vehicles = $query->getResult();
        $pagination = $paginator->paginate(
            $vehicles,
            $request->query->getInt('page', 1),
            12
        );

        foreach ($pagination as $card) {


            $cardss[] = [
                'id' => $card->getId(),
                'brand' => $card->getBrand(),
                'model' => $card->getModel(),
                'version' => $card->getVersion(),
                'year' => $card->getYear(),
                'energy' => $card->getEnergy(),
                'power' => $card->getPower(),
                'price' => $card->getPrice(),
                'percentage' => $this->Percentage($card),
                'price_retail' => $card->getPriceRetail(),
                'price_monthly' => $card->getPriceMonthly(),
                'mileage' => $card->getMileage(),
                'pics' => $card->getPics()
            ];
        }

        return $this->json([
            'vehicles' => $cardss,
        ]);
    }

}
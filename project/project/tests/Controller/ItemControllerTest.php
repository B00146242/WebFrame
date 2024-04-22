<?php

namespace App\Test\Controller;

use App\Entity\Item;
use App\Repository\ItemRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ItemControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/item/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(Item::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Item index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'item[Material]' => 'Testing',
            'item[Colour]' => 'Testing',
            'item[Damaged]' => 'Testing',
            'item[typeOfClothing]' => 'Testing',
            'item[price]' => 'Testing',
        ]);

        self::assertResponseRedirects('/sweet/food/');

        self::assertSame(1, $this->getRepository()->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Item();
        $fixture->setMaterial('My Title');
        $fixture->setColour('My Title');
        $fixture->setDamaged('My Title');
        $fixture->setTypeOfClothing('My Title');
        $fixture->setPrice('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Item');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Item();
        $fixture->setMaterial('Value');
        $fixture->setColour('Value');
        $fixture->setDamaged('Value');
        $fixture->setTypeOfClothing('Value');
        $fixture->setPrice('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'item[Material]' => 'Something New',
            'item[Colour]' => 'Something New',
            'item[Damaged]' => 'Something New',
            'item[typeOfClothing]' => 'Something New',
            'item[price]' => 'Something New',
        ]);

        self::assertResponseRedirects('/item/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getMaterial());
        self::assertSame('Something New', $fixture[0]->getColour());
        self::assertSame('Something New', $fixture[0]->getDamaged());
        self::assertSame('Something New', $fixture[0]->getTypeOfClothing());
        self::assertSame('Something New', $fixture[0]->getPrice());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new Item();
        $fixture->setMaterial('Value');
        $fixture->setColour('Value');
        $fixture->setDamaged('Value');
        $fixture->setTypeOfClothing('Value');
        $fixture->setPrice('Value');

        $this->manager->remove($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/item/');
        self::assertSame(0, $this->repository->count([]));
    }
}

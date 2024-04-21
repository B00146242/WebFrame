<?php

namespace App\Test\Controller;

use App\Entity\ClientProfile;
use App\Repository\ClientProfileRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ClientProfileControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/client/profile/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(ClientProfile::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ClientProfile index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'client_profile[name]' => 'Testing',
            'client_profile[age]' => 'Testing',
            'client_profile[email]' => 'Testing',
            'client_profile[Dob]' => 'Testing',
            'client_profile[HistoryOfPurchase]' => 'Testing',
            'client_profile[RentalStatus]' => 'Testing',
        ]);

        self::assertResponseRedirects('/sweet/food/');

        self::assertSame(1, $this->getRepository()->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new ClientProfile();
        $fixture->setName('My Title');
        $fixture->setAge('My Title');
        $fixture->setEmail('My Title');
        $fixture->setDob('My Title');
        $fixture->setHistoryOfPurchase('My Title');
        $fixture->setRentalStatus('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('ClientProfile');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new ClientProfile();
        $fixture->setName('Value');
        $fixture->setAge('Value');
        $fixture->setEmail('Value');
        $fixture->setDob('Value');
        $fixture->setHistoryOfPurchase('Value');
        $fixture->setRentalStatus('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'client_profile[name]' => 'Something New',
            'client_profile[age]' => 'Something New',
            'client_profile[email]' => 'Something New',
            'client_profile[Dob]' => 'Something New',
            'client_profile[HistoryOfPurchase]' => 'Something New',
            'client_profile[RentalStatus]' => 'Something New',
        ]);

        self::assertResponseRedirects('/client/profile/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getName());
        self::assertSame('Something New', $fixture[0]->getAge());
        self::assertSame('Something New', $fixture[0]->getEmail());
        self::assertSame('Something New', $fixture[0]->getDob());
        self::assertSame('Something New', $fixture[0]->getHistoryOfPurchase());
        self::assertSame('Something New', $fixture[0]->getRentalStatus());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new ClientProfile();
        $fixture->setName('Value');
        $fixture->setAge('Value');
        $fixture->setEmail('Value');
        $fixture->setDob('Value');
        $fixture->setHistoryOfPurchase('Value');
        $fixture->setRentalStatus('Value');

        $this->manager->remove($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/client/profile/');
        self::assertSame(0, $this->repository->count([]));
    }
}

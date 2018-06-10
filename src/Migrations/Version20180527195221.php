<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

final class Version20180527195221 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        $this->addSql('INSERT INTO versions VALUES(null, "BETA-001", now(), 1)');
    }

    public function down(Schema $schema) : void
    {
        $this->addSql('DELETE FROM versions WHERE version_number= "BETA-001"');
    }
}

<?php

/**
 * This file is part of the Phalcon Framework.
 *
 * (c) Phalcon Team <team@phalcon.io>
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Phalcon\Test\Database\Mvc\Model\MetaData;

use DatabaseTester;
use Phalcon\Mvc\Model\MetaData;
use Phalcon\Test\Fixtures\Traits\DiTrait;
use Phalcon\Test\Models\Invoices;

/**
 * Class GetAttributesCest
 */
class GetAttributesCest
{
    use DiTrait;

    public function _before(DatabaseTester $I)
    {
        $this->setNewFactoryDefault();
        $this->setDatabase($I);
    }

    /**
     * Tests Phalcon\Mvc\Model\MetaData :: getAttributes()
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2020-02-01
     */
    public function mvcModelMetadataGetAttributes(DatabaseTester $I)
    {
        $I->wantToTest('Mvc\Model\MetaData - getAttributes()');

        /** @var MetaData $metadata */
        $metadata = $this->container->get('modelsMetadata');

        $model    = new Invoices();
        $expected = [
            'inv_id',
            'inv_cst_id',
            'inv_status_flag',
            'inv_title',
            'inv_total',
            'inv_created_at',
        ];
        $actual   = $metadata->getAttributes($model);
        $I->assertEquals($expected, $actual);
    }
}

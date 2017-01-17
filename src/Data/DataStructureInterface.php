<?php

namespace CashManager\Data;

use CashManager\Factory\CreateObjectInterface;

interface DataStructureInterface extends DataStructureReaderInterface, DataStructureWriterInterface, CreateObjectInterface
{
}

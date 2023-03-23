<?php
class ArrayComparer {

    private $originalArray;
    private $updatedArray;

    public function __construct(array $originalArray, array $updatedArray) {
        $this->originalArray = $originalArray;
        $this->updatedArray = $updatedArray;
    }

    public function compare() {
        $newElements = array_diff($this->updatedArray, $this->originalArray);
        $removedElements = array_diff($this->originalArray, $this->updatedArray);

        return array($newElements, $removedElements);
    }
}

$originalArray = array(1, 2, 3, 4, 5);
$updatedArray = array(1, 3, 5, 7, 9);

$comparer = new ArrayComparer($originalArray, $updatedArray);
list($newElements, $removedElements) = $comparer->compare();

echo "New Element added\n";
print_r($newElements); 
echo "Item Removed\n";
print_r($removedElements);


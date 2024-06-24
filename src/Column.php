<?php


namespace Savannabits\Pagetables;

class Column
{
    private string $title;
    private string $name;
    private string $type = 'string';
    private bool $raw = false;
    private bool $sortable = false;
    private ?string $sortKey = null;
    private ?string $searchKey = null;
    private bool $searchable = false;
    private string $sortDirection = "asc";
    private ?string $itemField = null;
    private ?array $items = null;

    /**
     * @return array
     */
    public function getItemField(): ?string
    {
        return $this->itemField;
    }

    /**
     * @return array
     */
    public function getItems(): ?array
    {
        return $this->items;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    
    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return bool
     */
    public function isRaw(): bool
    {
        return $this->raw;
    }

    /**
     * @return bool
     */
    public function isSortable(): bool
    {
        return $this->sortable;
    }

    /**
     * @return string|null
     */
    public function getSortKey(): ?string
    {
        return $this->sortKey ?? $this->name;
    }

    /**
     * @return string|null
     */
    public function getSearchKey(): ?string
    {
        return $this->searchKey ?? $this->name;
    }

    /**
     * @return bool
     */
    public function isSearchable(): bool
    {
        return $this->searchable;
    }

    /**
     * @return string
     */
    public function getSortDirection(): string
    {
        return $this->sortDirection;
    }

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public static function name($name): Column
    {
        $instance = new self($name);

        return $instance;
    }

    public function title(string $title): Column
    {
        $this->title = $title;

        return $this;
    }
    
    public function type(string $type): Column
    {
        $this->type = $type;

        return $this;
    }

    public function raw(bool $raw = true): Column
    {
        $this->raw = $raw;

        return $this;
    }

    public function sort($key = null): Column
    {
        $this->sortable = true;
        $this->sortKey = is_null($key) ? $this->name : $key;
        $this->sortDirection = "asc";

        return $this;
    }

    public function sortDesc($key = null): Column
    {
        $this->sortable = true;
        $this->sortKey = is_null($key) ? $this->name : $key;
        $this->sortDirection = "desc";

        return $this;
    }

    public function searchable($key = null): Column
    {
        $this->searchable = true;
        $this->searchKey = $key ?? $this->name;

        return $this;
    }

    public function itemField($itemField): Column
    {
        $this->itemField = $itemField;

        return $this;
    }

    public function items($items): Column
    {
        $this->items = $items;

        return $this;
    }

    public function toArray()
    {
        return [
            "title" => $this->getTitle(),
            "name" => $this->getName(),
            "type" => $this->getType(),
            "raw" => $this->isRaw(),
            "sortable" => $this->isSortable(),
            "searchable" => $this->isSearchable(),
            "sort_key" => $this->getSortKey(),
            "search_key" => $this->getSearchKey(),
            "sort_direction" => $this->getSortDirection(),
            "items" => $this->getItems(),
            "item_field" => $this->getItemField()
        ];
    }
}

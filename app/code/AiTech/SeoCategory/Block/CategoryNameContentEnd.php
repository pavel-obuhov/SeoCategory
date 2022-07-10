<?php
namespace AiTech\SeoCategory\Block;

use Magento\Framework\View\Element\Template\Context;

class CategoryNameContentEnd extends \Magento\Framework\View\Element\Template
{
    /**
     * @var \Magento\Catalog\Model\Layer\Resolver
     */
    private $layerResolver;

    public function __construct(
        Context $context,
        \Magento\Catalog\Model\Layer\Resolver $layerResolver,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->layerResolver = $layerResolver;
    }

    protected function _toHtml() : string
    {
        if ($this->layerResolver->get()->getCurrentCategory()->getSeoIsShowTitleAtBottom()) {
            return '<h2 class="page-title">'
                . $this->layerResolver->get()->getCurrentCategory()->getName() .
                '</h2>';
        }

        return '';
    }
}

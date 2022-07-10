<?php
namespace AiTech\SeoCategory\Block;

use Magento\Framework\View\Element\Template\Context;

class Seo extends \Magento\Framework\View\Element\Template
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

    /**
     * @return \Magento\Catalog\Model\Category
     */
    public function getCurrentCategory()
    {
        return $this->layerResolver->get()->getCurrentCategory();
    }

    public function showSeoContent() : string
    {
        return  $this->getCurrentCategory()->getSeoCategoryVisibleText();
    }

    protected function _toHtml() : string
    {
        if ($this->layerResolver->get()->getCurrentCategory()->getSeoIsShowTitleAtBottom()) {
            return $this->showSeoContent();
        }

        return '';
    }
}

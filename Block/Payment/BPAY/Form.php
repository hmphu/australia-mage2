<?php
/**
 * Fontis Australia Extension for Magento 2
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/osl-3.0.php
 *
 * @category   Fontis
 * @package    Fontis_Australia
 * @copyright  Copyright (c) 2017 Fontis Pty. Ltd. (https://www.fontis.com.au)
 * @license    https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace Fontis\Australia\Block\Payment\BPAY;

use Magento\Payment\Block\Form as MagentoPaymentForm;

class Form extends MagentoPaymentForm
{
    /**
     * Bank transfer template
     *
     * @var string
     */
    protected $_template = "Fontis_Australia::payment/bpay/form.phtml";

    /**
     * @var array
     */
    private $checkoutConfig = null;

    /**
     * @return array
     */
    private function getCheckoutConfig()
    {
        if ($this->checkoutConfig === null) {
            $this->checkoutConfig = $this->getMethod()->getCheckoutConfig();
        }
        return $this->checkoutConfig;
    }

    /**
     * @return string
     */
    public function getBillerCode()
    {
        return $this->getCheckoutConfig()["biller_code"];
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->getCheckoutConfig()["message"];
    }
}

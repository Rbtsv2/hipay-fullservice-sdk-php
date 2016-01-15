<?php
/*
 * Hipay fullservice SDK
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the MIT License
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/mit-license.php
 *
 * @copyright      Copyright (c) 2016 - Hipay
 * @license        http://opensource.org/licenses/mit-license.php MIT License
 *
 */
namespace Hipay\Fullservice\Validator;

use Hipay\Fullservice\Validator\AbstractValidator;
use Respect\Validation\Validator as v;
use Hipay\Fullservice\Mapper\AbstractMapper;

/**
 * Validator based on awesome Respect/Validation
 * @see https://github.com/Respect/Validation
 *
 * @package Hipay\Fullservice
 * @author Kassim Belghait <kassim@sirateck.com>
 * @copyright Copyright (c) 2016 - Hipay
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @link https://github.com/hipay/hipay-fullservice-sdk-php
 * @api
 */
class RespectValidator extends AbstractValidator {
	
	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see AbstractValidator::doValidate()
	 */
	protected function doValidate(AbstractMapper $mapper){
		
		$mapping = $mapper->getMapping();
		$objectToValid = $mapper->getRequestObject();
		
		$v = v::create();
		foreach ($mapping as $field=>$rule){
			$v->attribute($field,$rule);
		}
		
		$v->validate($objectToValid);
		
	}
	
}
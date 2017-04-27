<?php namespace KlarnaOrderManagement;

/**
 * Copyright 2017 Jason Grim
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * @package    KlarnaOrderManagement
 * @author     Jason Grim <me@jasongrim.com>
 */

use KlarnaCore\Resource;

/**
 * Class OrderManagement
 *
 * @package KlarnaOrderManagement
 */
class OrderManagement extends Resource
{
    /**
     * @param string $id
     *
     * @see https://developers.klarna.com/api/#order-management-api-get-order
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function get($id)
    {
        return $this->client->get(sprintf('ordermanagement/v1/orders/%s', $id));
    }

    /**
     * @param string $id
     *
     * @see https://developers.klarna.com/api/#order-management-api-acknowledge-order
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function acknowledge($id)
    {
        return $this->client->post(sprintf('ordermanagement/v1/orders/%s/acknowledge', $id));
    }

    /**
     * @param string $id
     * @param array  $data
     *
     * @see https://developers.klarna.com/api/#order-management-api-set-new-order-amount-and-order-lines
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function change($id, array $data)
    {
        return $this->client->post(sprintf('ordermanagement/v1/orders/%s/authorization', $id), [
            'json' => $data
        ]);
    }

    /**
     * @param string $id
     * @param array  $data
     *
     * @see https://developers.klarna.com/api/#order-management-api-adjust-order-amount-and-order-lines
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function update($id, array $data)
    {
        return $this->client->post(sprintf('ordermanagement/v1/orders/%s/authorization-adjustments', $id), [
            'json' => $data
        ]);
    }

    /**
     * @param string $id
     *
     * @see https://developers.klarna.com/api/#order-management-api-cancel-order
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function cancel($id)
    {
        return $this->client->post(sprintf('ordermanagement/v1/orders/%s/cancel', $id));
    }

    /**
     * @param string $id
     * @param array  $data
     *
     * @see https://developers.klarna.com/api/#order-management-api-update-customer-addresses
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function updateCustomerDetails($id, array $data)
    {
        return $this->client->patch(sprintf('ordermanagement/v1/orders/%s/customer-details', $id), [
            'json' => $data
        ]);
    }

    /**
     * @param string $id
     *
     * @see https://developers.klarna.com/api/#order-management-api-extend-authorization-time
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function extendAuthorization($id)
    {
        return $this->client->post(sprintf('ordermanagement/v1/orders/%s/cancel', $id));
    }

    /**
     * @param string $id
     * @param array  $data
     *
     * @see https://developers.klarna.com/api/#order-management-api-update-merchant-references
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function updateMerchantReferences($id, array $data)
    {
        return $this->client->patch(sprintf('ordermanagement/v1/orders/%s/merchant-references', $id), [
            'json' => $data
        ]);
    }

    /**
     * @param string $id
     *
     * @see https://developers.klarna.com/api/#order-management-api-release-remaining-authorization
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function releaseRemainingAuthorization($id)
    {
        return $this->client->post(sprintf('ordermanagement/v1/orders/%s/release-remaining-authorization', $id));
    }

    /**
     * @param string $id
     *
     * @see https://developers.klarna.com/api/#order-management-api-get-all-captures-for-one-order
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function getCaptures($id)
    {
        return $this->client->get(sprintf('ordermanagement/v1/orders/%s/captures', $id));
    }

    /**
     * @param string $id
     * @param array  $data
     *
     * @see https://developers.klarna.com/api/#order-management-api-create-capture
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function capture($id, array $data)
    {
        return $this->client->post(sprintf('ordermanagement/v1/orders/%s/captures', $id), [
            'json' => $data
        ]);
    }

    /**
     * @param string $id
     * @param string $captureId
     *
     * @see https://developers.klarna.com/api/#order-management-api-get-one-capture
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function getCapture($id, $captureId)
    {
        return $this->client->get(sprintf('ordermanagement/v1/orders/%s/captures/%s', $id, $captureId));
    }

    /**
     * @param string $id
     * @param string $captureId
     * @param array  $data
     *
     * @see https://developers.klarna.com/api/#order-management-api-add-shipping-info-to-a-capture
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function addShippingDetailsToCapture($id, $captureId, array $data)
    {
        return $this->client->post(sprintf('ordermanagement/v1/orders/%s/captures/%s/shipping-info', $id, $captureId), [
            'json' => $data
        ]);
    }

    /**
     * @param string $id
     * @param string $captureId
     *
     * @see https://developers.klarna.com/api/#order-management-api-trigger-resend-of-customer-communication
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function triggerCaptureSendOut($id, $captureId)
    {
        return $this->client->post(sprintf('ordermanagement/v1/orders/%s/captures/%s/trigger-send-out', $id, $captureId));
    }

    /**
     * @param string $id
     * @param array  $data
     *
     * @see https://developers.klarna.com/api/#order-management-api-create-a-refund
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function refund($id, array $data)
    {
        return $this->client->post(sprintf('ordermanagement/v1/orders/%s/refunds', $id), [
            'json' => $data
        ]);
    }

    /**
     * @param string $id
     * @param string $refundId
     *
     * @see https://developers.klarna.com/api/#order-management-api-get-refund
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function getRefund($id, $refundId)
    {
        return $this->client->get(sprintf('ordermanagement/v1/orders/%s/refunds/%s', $id, $refundId));
    }
}

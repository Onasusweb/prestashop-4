<?php

include_once _PS_MODULE_DIR_ . 'aplazame/controllers/front/Api/serializer.php';

final class AplazameApiOrder
{
    /**
     * @var Db
     */
    private $db;

    public function __construct(Db $db)
    {
        $this->db = $db;
    }

    public function history(array $params, array $queryArguments)
    {
        if (!isset($params['order_id'])) {
            return AplazameApiModuleFrontController::not_found();
        }

        $orderId = Order::getOrderByCartId($params['order_id']);
        $order = new Order($orderId);
        if (!Validate::isLoadedObject($order)) {
            return AplazameApiModuleFrontController::not_found();
        }

        $page = (isset($queryArguments['page'])) ? (int) $queryArguments['page'] : 1;
        $page_size = (isset($queryArguments['page_size'])) ? (int) $queryArguments['page_size'] : 10;
        $offset = ($page - 1) * $page_size;

        $orders = $this->db->executeS(
            'SELECT id_order FROM ' . _DB_PREFIX_ . 'orders'
            . ' WHERE id_customer = ' . (int) $order->id_customer
            . ' LIMIT ' . (int) $offset . ', ' . (int) $page_size
        );

        $historyOrders = array();

        foreach ($orders as $orderData) {
            $historyOrders[] = Aplazame_Aplazame_Api_BusinessModel_HistoricalOrder::createFromOrder(new Order($orderData['id_order']));
        }

        return AplazameApiModuleFrontController::collection($page, $page_size, $historyOrders);
    }
}

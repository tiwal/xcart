

UPDATE xcart_config SET value='N' WHERE name='enable_shipping';
DELETE FROM xcart_shipping WHERE shippingid in (1011,1012,1013);
UPDATE xcart_payment_methods SET surcharge = '0.00', surcharge_type= '$',active='' WHERE paymentid IN (4,8);
DELETE FROM xcart_shipping_rates WHERE rateid in (111,112,113);

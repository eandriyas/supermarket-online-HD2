`pwl`
INSERT INTO `pwl`.`order` (`date_order`, `id_pelanggan`) VALUES ('2013-12-22 15:10:46', '10'); 

INSERT INTO order_new (date_order, id_pelanggan) VALUES ('2013-12-22 09:09:05','14')

INSERT INTO beli (id_barang, jumlah, id_order) VALUES ('26', '3', '4')
INSERT INTO `pwl`.`beli` (`id_barang`, `jumlah`, `id_order`) VALUES ('25', '2', '4');

SELECT * FROM `order_new` WHERE id_pelanggan ORDER BY `date_order` ASC 
SELECT id_order FROM `order_new` WHERE id_pelanggan='7' ORDER BY `date_order` DESC LIMIT 0, 1; 

SELECT order_new.id_order, pelanggan.id_pelanggan, barang.id_barang FROM order_new, beli, barang, pelanggan JOIN 

SELECT order_new.id_order, order_new.id_pelanggan, pelanggan.`nama_pelanggan`, beli.id_barang,barang.`nama_barang`, jumlah, barang.`harga`, 
(harga*jumlah) AS total
FROM order_new 
INNER JOIN beli ON order_new.`id_order`=beli.`id_order` 
INNER JOIN pelanggan ON order_new.`id_pelanggan`=pelanggan.`id_pelanggan`
INNER JOIN barang ON barang.`id_barang`=beli.`id_barang`
WHERE order_new.`id_pelanggan`=7

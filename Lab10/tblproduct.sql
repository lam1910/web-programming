--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL
) DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproduct`
--
INSERT INTO blog_samples.tblproduct (id, name, code, image, price) VALUES (1, 'Visual Studio', '3DcAM01', 'product-images/vs.png', 1299);
INSERT INTO blog_samples.tblproduct (id, name, code, image, price) VALUES (2, 'Windows 10 Home', 'FG568', 'product-images/winh.png', 139);
INSERT INTO blog_samples.tblproduct (id, name, code, image, price) VALUES (3, 'Windows 10 Pro', 'FG896', 'product-images/winp.jpeg', 200);
INSERT INTO blog_samples.tblproduct (id, name, code, image, price) VALUES (4, 'Microsoft 365 Business Standard', 'LPN45', 'product-images/w365b.png', 1200);
--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

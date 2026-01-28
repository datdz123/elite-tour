<?php
/**
 * The header for our theme
 *
 * This is the template that displays the `head` element and everything up
 * until the `#content` element.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gnws
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<div class="topbar">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-6 col-12">
					<div class="topbar_add">
						<img src="images/address.png" alt="Địa chỉ">
						Phòng 3618 - 3619, Tòa C5 D'Capitale, Số 119 Trần Duy Hưng, Hà Nội
					</div>
				</div>
				<div class="col-lg-6 col-12">
					<div class="topbar_list">
						<div class="group_phone">
							<a href="tel:02435642888" title="024 3564 2888">
								<img src="images/call2.png" alt="Hotline">
								024 3564 2888
							</a>
							-
							<a href="tel:0912120208" title="0912 120 208 ">
								<img src="images/call2.png" alt="Hotline">
								0912 120 208
							</a>
						</div>

						<a href="/gioi-thieu" title="GIỚI THIỆU">
							GIỚI THIỆU
						</a>
						<a href="/hoi-dap" title="Hỏi đáp">
							Hỏi đáp
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<header class="header">
		<div class="evo-main-nav">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-2 col-12 logo evo-header-mobile">
						<a href="/" class="logo-wrapper header_logo"
							title="Elite Tour - Công ty du lịch uy tín chuyên Tour, Du thuyền, Khách sạn">
							<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
								data-src="//bizweb.dktcdn.net/100/562/154/themes/1004558/assets/logo.png?1768795562299"
								alt="Elite Tour - Công ty du lịch uy tín chuyên Tour, Du thuyền, Khách sạn"
								class="lazy img-responsive center-block">
						</a>
						<button type="button" class="evo-flexitem evo-flexitem-fill d-sm-inline-block d-lg-none"
							id="trigger-mobile" aria-label="Menu Mobile">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="col-lg-9 col-12 ">
						<div class="evo-main-menu d-lg-block d-none">
							<ul id="nav" class="nav">

								<li class="nav-item active">
									<a class="nav-link" href="/" title="TRANG CHỦ">
										<img class="icon_nav" src="images/icon_nav_1.png" alt="TRANG CHỦ">
										TRANG CHỦ

									</a>
								</li>

								<li class=" nav-item has-childs   has-mega">
									<a href="/tour" class="nav-link" title="Tour">
										<img class="icon_nav" src="images/icon_nav_2.png" alt="Tour">
										Tour
										<svg xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
											viewBox="0 0 490.656 490.656"
											style="enable-background:new 0 0 490.656 490.656;" xml:space="preserve"
											width="25px" height="25px">
											<path
												d="M487.536,120.445c-4.16-4.16-10.923-4.16-15.083,0L245.339,347.581L18.203,120.467c-4.16-4.16-10.923-4.16-15.083,0    c-4.16,4.16-4.16,10.923,0,15.083l234.667,234.667c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.136l234.667-234.667    C491.696,131.368,491.696,124.605,487.536,120.445z"
												data-original="#000000" class="active-path" data-old_color="#000000"
												fill="#141414"></path>
										</svg>
									</a>
									<div class="mega-content">
										<div class="col-lg-3 no-padding">
											<ul class="level0">
												<li class="level1 parent item fix-navs active">
													<a class="hmega" href="/tour-trong-nuoc"
														title="Tour Trong Nước"><span>Tour Trong Nước</span></a>
													<div class="evo-sub-cate-1">
														<div class="row fix-padding">
															<div class="col-lg-9">
																<ul class="level1 row">
																	<li class="level2 col-lg-4">
																		<a href="/tour-mien-bac"
																			title="Tour Miền Bắc">Tour Miền Bắc</a>
																		<ul class="level3">
																			<li><a href="/ha-noi" title="Hà Nội">Hà
																					Nội</a></li>
																			<li><a href="/phu-tho" title="Phú Thọ">Phú
																					Thọ</a></li>
																			<li><a href="/sapa" title="Sapa">Sapa</a>
																			</li>
																			<li><a href="/ha-giang" title="Hà Giang">Hà
																					Giang</a></li>
																			<li><a href="/moc-chau" title="Mộc Châu">Mộc
																					Châu</a></li>
																			<li><a href="/dien-bien"
																					title="Điện Biên">Điện Biên</a></li>
																			<li><a href="/lao-cai" title="Lào Cai">Lào
																					Cai</a></li>
																			<li><a href="/cao-bang" title="Cao Bằng">Cao
																					Bằng</a></li>
																			<li><a href="/ha-long" title="Hạ Long">Hạ
																					Long</a></li>
																			<li><a href="/ninh-binh"
																					title="Ninh Bình">Ninh Bình</a></li>
																			<li><a href="/hai-phong"
																					title="Hải Phòng">Hải Phòng</a></li>
																		</ul>
																	</li>
																	<li class="level2 col-lg-4">
																		<a href="/tour-mien-trung"
																			title="Tour Miền Trung">Tour Miền Trung</a>
																		<ul class="level3">
																			<li><a href="/thanh-hoa"
																					title="Thanh Hóa">Thanh Hóa</a></li>
																			<li><a href="/quang-tri"
																					title="Quảng Trị">Quảng Trị</a></li>
																			<li><a href="/khanh-hoa"
																					title="Khánh Hòa">Khánh Hòa</a></li>
																			<li><a href="/lam-dong" title="Lâm Đồng">Lâm
																					Đồng</a></li>
																			<li><a href="/hue" title="Huế">Huế</a></li>
																			<li><a href="/da-nang" title="Đà Nẵng">Đà
																					Nẵng</a></li>
																			<li><a href="/hoi-an" title="Hội An">Hội
																					An</a></li>
																			<li><a href="/quang-ngai"
																					title="Quảng Ngãi">Quảng Ngãi</a>
																			</li>
																			<li><a href="/quy-nhon" title="Quy Nhơn">Quy
																					Nhơn</a></li>
																			<li><a href="/phu-yen" title="Phú Yên">Phú
																					Yên</a></li>
																			<li><a href="/nha-trang"
																					title="Nha Trang">Nha Trang</a></li>
																			<li><a href="/tay-nguyen"
																					title="Tây Nguyên">Tây Nguyên</a>
																			</li>
																			<li><a href="/da-lat" title="Đà Lạt">Đà
																					Lạt</a></li>
																		</ul>
																	</li>
																	<li class="level2 col-lg-4">
																		<a href="/tour-mien-nam"
																			title="Tour Miền Nam">Tour Miền Nam</a>
																		<ul class="level3">
																			<li><a href="/sai-gon" title="Sài Gòn">Sài
																					Gòn</a></li>
																			<li><a href="/can-tho" title="Cần Thơ">Cần
																					Thơ</a></li>
																			<li><a href="/phu-quoc" title="Phú Quốc">Phú
																					Quốc</a></li>
																			<li><a href="/con-dao" title="Côn Đảo">Côn
																					Đảo</a></li>
																			<li><a href="/mien-tay"
																					title="Miền Tây">Miền Tây</a></li>
																		</ul>
																	</li>
																</ul>
															</div>
															<div class="col-lg-3">
																<a href="#" title="Tour">
																	<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
																		data-src="//bizweb.dktcdn.net/100/562/154/themes/1004558/assets/mega-1-image.jpg?1768795562299"
																		alt="Tour"
																		class="lazy img-responsive mx-auto d-block">
																</a>
															</div>
														</div>
													</div>
												</li>
												<li class="level1 parent item fix-navs ">
													<a class="hmega" href="/tour-nuoc-ngoai"
														title="Tour Nước Ngoài"><span>Tour Nước Ngoài</span></a>
													<div class="evo-sub-cate-1">
														<div class="row fix-padding">
															<div class="col-lg-9">
																<ul class="level1 row">
																	<li class="level2 col-lg-4">
																		<a href="/dong-nam-a" title="Đông Nam Á">Đông
																			Nam Á</a>
																		<ul class="level3">
																			<li><a href="/lao" title="Lào">Lào</a></li>
																			<li><a href="/myanmar"
																					title="Myanmar">Myanmar</a></li>
																			<li><a href="/malaysia"
																					title="Malaysia">Malaysia</a></li>
																			<li><a href="/campuchia"
																					title="Campuchia">Campuchia</a></li>
																			<li><a href="/bali" title="BaLi">BaLi</a>
																			</li>
																			<li><a href="/singapore"
																					title="Singapore">Singapore</a></li>
																			<li><a href="/thai-lan"
																					title="Thái Lan">Thái Lan</a></li>
																		</ul>
																	</li>
																	<li class="level2 col-lg-4">
																		<a href="/dong-a" title="Đông Á">Đông Á</a>
																		<ul class="level3">
																			<li><a href="/nhat-ban"
																					title="Nhật Bản">Nhật Bản</a></li>
																			<li><a href="/han-quoc" title="Hàn Quốc">Hàn
																					Quốc</a></li>
																			<li><a href="/hong-kong"
																					title="Hong Kong">Hong Kong</a></li>
																			<li><a href="/dai-loan" title="Đài Loan">Đài
																					Loan</a></li>
																			<li><a href="/trung-quoc"
																					title="Trung Quốc">Trung Quốc</a>
																			</li>
																		</ul>
																	</li>
																	<li class="level2 col-lg-4">
																		<a href="/nam-a" title="Nam Á">Nam Á</a>
																		<ul class="level3">
																			<li><a href="/an-do" title="Ấn Độ">Ấn Độ</a>
																			</li>
																		</ul>
																	</li>
																	<li class="level2 col-lg-4">
																		<a href="/tay-a" title="Tây Á">Tây Á</a>
																		<ul class="level3">
																			<li><a href="/dubai" title="Dubai">Dubai</a>
																			</li>
																		</ul>
																	</li>
																	<li class="level2 col-lg-4">
																		<a href="/chau-uc" title="Châu Úc">Châu Úc</a>
																		<ul class="level3">
																			<li><a href="/uc" title="Úc">Úc</a></li>
																		</ul>
																	</li>
																	<li class="level2 col-lg-4">
																		<a href="/chau-phi" title="Châu Phi">Châu
																			Phi</a>
																		<ul class="level3">
																			<li><a href="/nam-phi" title="Nam Phi">Nam
																					Phi</a></li>
																			<li><a href="/maroc" title="Maroc">Maroc</a>
																			</li>
																		</ul>
																	</li>
																	<li class="level2 col-lg-4">
																		<a href="/chau-my" title="Châu Mỹ">Châu Mỹ</a>
																		<ul class="level3">
																			<li><a href="/my" title="Mỹ">Mỹ</a></li>
																		</ul>
																	</li>
																	<li class="level2 col-lg-4">
																		<a href="/chau-au" title="Châu Âu">Châu Âu</a>
																	</li>
																</ul>
															</div>
															<div class="col-lg-3">
																<a href="#" title="Tour">
																	<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
																		data-src="//bizweb.dktcdn.net/100/562/154/themes/1004558/assets/mega-2-image.jpg?1768795562299"
																		alt="Tour"
																		class="lazy img-responsive mx-auto d-block">
																</a>
															</div>
														</div>
													</div>
												</li>
												<li class="level1 item ">
													<a class="hmega" href="/tour-xuyen-viet"
														title="Tour Xuyên Việt"><span>Tour Xuyên Việt</span></a>
												</li>
											</ul>
										</div>
									</div>
								</li>

								<li class=" nav-item has-childs   has-mega">
									<a href="/combo-du-lich" class="nav-link" title="COMBO">
										<img class="icon_nav" src="images/icon_nav_3.png" alt="COMBO">
										COMBO
										<svg xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
											viewBox="0 0 490.656 490.656"
											style="enable-background:new 0 0 490.656 490.656;" xml:space="preserve"
											width="25px" height="25px">
											<path
												d="M487.536,120.445c-4.16-4.16-10.923-4.16-15.083,0L245.339,347.581L18.203,120.467c-4.16-4.16-10.923-4.16-15.083,0    c-4.16,4.16-4.16,10.923,0,15.083l234.667,234.667c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.136l234.667-234.667    C491.696,131.368,491.696,124.605,487.536,120.445z"
												data-original="#000000" class="active-path" data-old_color="#000000"
												fill="#141414"></path>
										</svg>
									</a>
									<div class="mega-content">
										<div class="col-lg-3 no-padding">
											<ul class="level0">
												<li class="level1 item active">
													<a class="hmega" href="/combo-du-lich-da-lat"
														title="Combo du lịch Đà Lạt"><span>Combo du lịch Đà
															Lạt</span></a>
												</li>
												<li class="level1 item ">
													<a class="hmega" href="/combo-du-lich-phu-quoc"
														title="Combo du lịch Phú Quốc"><span>Combo du lịch Phú
															Quốc</span></a>
												</li>
												<li class="level1 item ">
													<a class="hmega" href="/combo-du-lich-quy-nhon"
														title="Combo du lịch Quy Nhơn"><span>Combo du lịch Quy
															Nhơn</span></a>
												</li>
												<li class="level1 item ">
													<a class="hmega" href="/combo-du-lich-nha-trang"
														title="Combo du lịch Nha Trang"><span>Combo du lịch Nha
															Trang</span></a>
												</li>
												<li class="level1 item ">
													<a class="hmega" href="/combo-du-lich-sapa"
														title="Combo du lịch Sapa"><span>Combo du lịch Sapa</span></a>
												</li>
												<li class="level1 item ">
													<a class="hmega" href="/combo-du-lich-ha-long"
														title="Combo du lịch Hạ Long"><span>Combo du lịch Hạ
															Long</span></a>
												</li>
											</ul>
										</div>
									</div>
								</li>

								<li class=" nav-item has-childs   has-mega">
									<a href="/khach-san" class="nav-link" title="KHÁCH SẠN">
										<img class="icon_nav" src="images/icon_nav_4.png" alt="KHÁCH SẠN">
										KHÁCH SẠN
										<svg xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
											viewBox="0 0 490.656 490.656"
											style="enable-background:new 0 0 490.656 490.656;" xml:space="preserve"
											width="25px" height="25px">
											<path
												d="M487.536,120.445c-4.16-4.16-10.923-4.16-15.083,0L245.339,347.581L18.203,120.467c-4.16-4.16-10.923-4.16-15.083,0    c-4.16,4.16-4.16,10.923,0,15.083l234.667,234.667c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.136l234.667-234.667    C491.696,131.368,491.696,124.605,487.536,120.445z"
												data-original="#000000" class="active-path" data-old_color="#000000"
												fill="#141414"></path>
										</svg>
									</a>
									<div class="mega-content">
										<div class="col-lg-3 no-padding">
											<ul class="level0">
												<li class="level1 parent item fix-navs active">
													<a class="hmega" href="/khach-san-mien-bac"
														title="Khách sạn Miền Bắc"><span>Khách sạn Miền Bắc</span></a>
													<div class="evo-sub-cate-1">
														<div class="row fix-padding">
															<div class="col-lg-9">
																<ul class="level1 row">
																	<li class="level2 col-lg-4">
																		<a href="/khach-san-ha-noi"
																			title="Khách sạn Hà Nội">Khách sạn Hà
																			Nội</a>
																	</li>
																	<li class="level2 col-lg-4">
																		<a href="/khach-san-hai-phong"
																			title="Khách sạn Hải Phòng">Khách sạn Hải
																			Phòng</a>
																	</li>
																	<li class="level2 col-lg-4">
																		<a href="/khach-san-sapa"
																			title="Khách sạn Sapa">Khách sạn Sapa</a>
																	</li>
																	<li class="level2 col-lg-4">
																		<a href="/khach-san-ha-long"
																			title="Khách sạn Hạ Long">Khách sạn Hạ
																			Long</a>
																	</li>
																	<li class="level2 col-lg-4">
																		<a href="/khach-san-ninh-binh"
																			title="Khách sạn Ninh Bình">Khách sạn Ninh
																			Bình</a>
																	</li>
																	<li class="level2 col-lg-4">
																		<a href="/khach-san-moc-chau"
																			title="Khách sạn Mộc Châu">Khách sạn Mộc
																			Châu</a>
																	</li>
																	<li class="level2 col-lg-4">
																		<a href="/khach-san-ha-giang"
																			title="Khách sạn Hà Giang">Khách sạn Hà
																			Giang</a>
																	</li>
																	<li class="level2 col-lg-4">
																		<a href="/khach-san-lao-cai"
																			title="Khách sạn Lào Cai">Khách sạn Lào
																			Cai</a>
																	</li>
																	<li class="level2 col-lg-4">
																		<a href="/khach-san-phu-tho"
																			title="Khách sạn Phú Thọ">Khách sạn Phú
																			Thọ</a>
																	</li>
																	<li class="level2 col-lg-4">
																		<a href="/khach-san-cao-bang"
																			title="Khách sạn Cao Bằng">Khách sạn Cao
																			Bằng</a>
																	</li>
																	<li class="level2 col-lg-4">
																		<a href="/khach-san-dien-bien"
																			title="Khách sạn Điện Biên">Khách sạn Điện
																			Biên</a>
																	</li>
																	<li class="level2 col-lg-4">
																		<a href="/khach-san-quang-ninh"
																			title="Khách sạn Quảng Ninh">Khách sạn Quảng
																			Ninh</a>
																	</li>
																</ul>
															</div>
															<div class="col-lg-3">
																<a href="#" title="KHÁCH SẠN">
																	<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
																		data-src="//bizweb.dktcdn.net/100/562/154/themes/1004558/assets/mega-1-image.jpg?1768795562299"
																		alt="KHÁCH SẠN"
																		class="lazy img-responsive mx-auto d-block">
																</a>
															</div>
														</div>
													</div>
												</li>
												<li class="level1 parent item fix-navs ">
													<a class="hmega" href="/khach-san-mien-trung"
														title="Khách sạn Miền Trung"><span>Khách sạn Miền
															Trung</span></a>
													<div class="evo-sub-cate-1">
														<div class="row fix-padding">
															<div class="col-lg-9">
																<ul class="level1 row">
																	<li class="level2 col-lg-4">
																		<a href="/khach-san-nha-trang"
																			title="Khách sạn Nha Trang">Khách sạn Nha
																			Trang</a>
																	</li>
																	<li class="level2 col-lg-4">
																		<a href="/khach-san-da-nang"
																			title="Khách sạn Đà Nẵng">Khách sạn Đà
																			Nẵng</a>
																	</li>
																	<li class="level2 col-lg-4">
																		<a href="/khach-san-quy-nhon"
																			title="Khách sạn Quy Nhơn">Khách sạn Quy
																			Nhơn</a>
																	</li>
																	<li class="level2 col-lg-4">
																		<a href="/khach-san-thanh-hoa"
																			title="Khách sạn Thanh Hóa">Khách sạn Thanh
																			Hóa</a>
																	</li>
																	<li class="level2 col-lg-4">
																		<a href="/khach-san-phu-yen"
																			title="Khách sạn Phú Yên">Khách sạn Phú
																			Yên</a>
																	</li>
																	<li class="level2 col-lg-4">
																		<a href="/khach-san-hue"
																			title="Khách sạn Huế">Khách sạn Huế</a>
																	</li>
																	<li class="level2 col-lg-4">
																		<a href="/khach-san-quang-tri"
																			title="Khách sạn Quảng Trị">Khách sạn Quảng
																			Trị</a>
																	</li>
																	<li class="level2 col-lg-4">
																		<a href="/khach-san-ninh-thuan"
																			title="Khách sạn Ninh Thuận">Khách sạn Ninh
																			Thuận</a>
																	</li>
																	<li class="level2 col-lg-4">
																		<a href="/khach-san-hoi-an"
																			title="Khách sạn Hội An">Khách sạn Hội
																			An</a>
																	</li>
																	<li class="level2 col-lg-4">
																		<a href="/khach-san-da-lat"
																			title="Khách sạn Đà Lạt">Khách sạn Đà
																			Lạt</a>
																	</li>
																	<li class="level2 col-lg-4">
																		<a href="/khach-san-binh-thuan"
																			title="Khách sạn Bình Thuận">Khách sạn Bình
																			Thuận</a>
																	</li>
																	<li class="level2 col-lg-4">
																		<a href="/khach-san-tay-nguyen"
																			title="Khách sạn Tây Nguyên">Khách sạn Tây
																			Nguyên</a>
																	</li>
																	<li class="level2 col-lg-4">
																		<a href="/khach-san-quang-ngai"
																			title="Khách sạn Quảng Ngãi">Khách sạn Quảng
																			Ngãi</a>
																	</li>
																</ul>
															</div>
															<div class="col-lg-3">
																<a href="#" title="KHÁCH SẠN">
																	<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
																		data-src="//bizweb.dktcdn.net/100/562/154/themes/1004558/assets/mega-1-image.jpg?1768795562299"
																		alt="KHÁCH SẠN"
																		class="lazy img-responsive mx-auto d-block">
																</a>
															</div>
														</div>
													</div>
												</li>
												<li class="level1 parent item fix-navs ">
													<a class="hmega" href="/khach-san-mien-nam"
														title="Khách sạn Miền Nam"><span>Khách sạn Miền Nam</span></a>
													<div class="evo-sub-cate-1">
														<div class="row fix-padding">
															<div class="col-lg-9">
																<ul class="level1 row">
																	<li class="level2 col-lg-4">
																		<a href="/khach-san-phu-quoc"
																			title="Khách sạn Phú Quốc">Khách sạn Phú
																			Quốc</a>
																	</li>
																	<li class="level2 col-lg-4">
																		<a href="/khach-san-con-dao"
																			title="Khách sạn Côn Đảo">Khách sạn Côn
																			Đảo</a>
																	</li>
																	<li class="level2 col-lg-4">
																		<a href="/khach-san-can-tho"
																			title="Khách sạn Cần Thơ">Khách sạn Cần
																			Thơ</a>
																	</li>
																	<li class="level2 col-lg-4">
																		<a href="/khach-san-sai-gon"
																			title="Khách sạn Sài Gòn">Khách sạn Sài
																			Gòn</a>
																	</li>
																	<li class="level2 col-lg-4">
																		<a href="/khach-san-mien-tay"
																			title="Khách sạn Miền Tây">Khách sạn Miền
																			Tây</a>
																	</li>
																</ul>
															</div>
															<div class="col-lg-3">
																<a href="#" title="KHÁCH SẠN">
																	<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
																		data-src="//bizweb.dktcdn.net/100/562/154/themes/1004558/assets/mega-1-image.jpg?1768795562299"
																		alt="KHÁCH SẠN"
																		class="lazy img-responsive mx-auto d-block">
																</a>
															</div>
														</div>
													</div>
												</li>
												<li class="level1 item ">
													<a class="hmega" href="/khach-san-vinpearl"
														title="Khách sạn Vinpearl"><span>Khách sạn Vinpearl</span></a>
												</li>
												<li class="level1 item ">
													<a class="hmega" href="/khach-san-flc"
														title="Khách sạn FLC"><span>Khách sạn FLC</span></a>
												</li>
											</ul>
										</div>
									</div>
								</li>

								<li class=" nav-item has-childs  ">
									<a href="/du-thuyen" class="nav-link" title="DU THUYỀN">
										<img class="icon_nav" src="images/icon_nav_5.png" alt="DU THUYỀN">
										DU THUYỀN
										<svg xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
											viewBox="0 0 490.656 490.656"
											style="enable-background:new 0 0 490.656 490.656;" xml:space="preserve"
											width="25px" height="25px">
											<path
												d="M487.536,120.445c-4.16-4.16-10.923-4.16-15.083,0L245.339,347.581L18.203,120.467c-4.16-4.16-10.923-4.16-15.083,0    c-4.16,4.16-4.16,10.923,0,15.083l234.667,234.667c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.136l234.667-234.667    C491.696,131.368,491.696,124.605,487.536,120.445z"
												data-original="#000000" class="active-path" data-old_color="#000000"
												fill="#141414"></path>
										</svg>
									</a>
									<ul class="dropdown-menu">
										<li class="nav-item-lv2"><a class="nav-link" href="/du-thuyen-vinh-ha-long"
												title="Du thuyền Vịnh Hạ Long">Du thuyền Vịnh Hạ Long</a></li>
										<li class="nav-item-lv2"><a class="nav-link" href="/du-thuyen-vinh-lan-ha"
												title="Du thuyền Vịnh Lan Hạ">Du thuyền Vịnh Lan Hạ</a></li>
									</ul>
								</li>

								<li class="evo-hover-left nav-item has-childs  ">
									<a href="/blogs/all" class="nav-link" title="BLOGS">
										<img class="icon_nav" src="images/icon_nav_6.png" alt="BLOGS">
										BLOGS
										<svg xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
											viewBox="0 0 490.656 490.656"
											style="enable-background:new 0 0 490.656 490.656;" xml:space="preserve"
											width="25px" height="25px">
											<path
												d="M487.536,120.445c-4.16-4.16-10.923-4.16-15.083,0L245.339,347.581L18.203,120.467c-4.16-4.16-10.923-4.16-15.083,0    c-4.16,4.16-4.16,10.923,0,15.083l234.667,234.667c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.136l234.667-234.667    C491.696,131.368,491.696,124.605,487.536,120.445z"
												data-original="#000000" class="active-path" data-old_color="#000000"
												fill="#141414"></path>
										</svg>
									</a>
									<ul class="dropdown-menu">
										<li class="nav-item-lv2"><a class="nav-link" href="/thien-duong-nghi-duong"
												title="Thiên đường nghỉ dưỡng">Thiên đường nghỉ dưỡng</a></li>
										<li class="nav-item-lv2"><a class="nav-link" href="/lich-trinh-hap-dan"
												title="Lịch trình hấp dẫn">Lịch trình hấp dẫn</a></li>
										<li class="nav-item-lv2"><a class="nav-link" href="/chuong-trinh-khuyen-mai"
												title="Chương trình khuyến mại">Chương trình khuyến mại</a></li>
										<li class="nav-item-lv2"><a class="nav-link" href="/kinh-nghiem-du-lich"
												title="Kinh nghiệm du lịch">Kinh nghiệm du lịch</a></li>
										<li class="nav-item-lv2"><a class="nav-link" href="/tin-tuc-noi-bo"
												title="Tin tức Nội bộ">Tin tức Nội bộ</a></li>
									</ul>
								</li>

								<li class="nav-item ">
									<a class="nav-link" href="/thu-vien-anh" title="THƯ VIỆN ẢNH">
										<img class="icon_nav" src="images/icon_nav_7.png" alt="THƯ VIỆN ẢNH">
										THƯ VIỆN ẢNH

									</a>
								</li>
							</ul>
						</div>


					</div>
					<div class="col-lg-1 col-12">
						<div class="header_search">
							<img class="header_search_img" src="images/search2.png" alt="Tìm kiếm">
							<div class="evo-search search-smart ">
								<form action="/search" method="get"
									class="evo-search-form header-search-form input-group search-bar" role="search">
									<div class="input-group">
										<input type="text" aria-label="Nhập tên Tour" name="query"
											class="input-group-field auto-search search-auto form-control"
											placeholder="Nhập từ khóa ..." autocomplete="off">
										<input type="hidden" name="type" value="product,article">
										<span class="input-group-append">
											<button class="btn btn-default" type="submit" aria-label="Tìm kiếm">
												<svg viewBox="0 0 451 451" style="width:20px;">
													<g fill="#000">
														<path d="M447.05,428l-109.6-109.6c29.4-33.8,47.2-77.9,47.2-126.1C384.65,86.2,298.35,0,192.35,0C86.25,0,0.05,86.3,0.05,192.3
															 s86.3,192.3,192.3,192.3c48.2,0,92.3-17.8,126.1-47.2L428.05,447c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4
															 C452.25,441.8,452.25,433.2,447.05,428z M26.95,192.3c0-91.2,74.2-165.3,165.3-165.3c91.2,0,165.3,74.2,165.3,165.3
															 s-74.1,165.4-165.3,165.4C101.15,357.7,26.95,283.5,26.95,192.3z"></path>
													</g>
												</svg>
											</button>
										</span>
									</div>

								</form>

							</div>
						</div>
					</div>
					<div class="col-lg-4 evo-account-and-cart d-none">
						<div class="evo-cart mini-cart">
							<a href="/cart" title="Giỏ hàng" aria-label="Giỏ hàng" rel="nofollow">
								<svg viewBox="0 0 100 100" data-radium="true" style="width: 25px;">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<g transform="translate(-286.000000, -515.000000)" fill="#fff">
											<path
												d="M374.302082,541.184324 C374.044039,539.461671 372.581799,538.255814 370.861517,538.255814 L351.078273,538.255814 L351.078273,530.159345 C351.078273,521.804479 344.283158,515 335.93979,515 C327.596422,515 320.801307,521.804479 320.801307,530.159345 L320.801307,538.255814 L301.018063,538.255814 C299.297781,538.255814 297.835541,539.461671 297.577499,541.184324 L286.051608,610.951766 C285.87958,611.985357 286.137623,613.018949 286.825735,613.794143 C287.513848,614.569337 288.460003,615 289.492173,615 L382.387408,615 L382.473422,615 C384.451746,615 386,613.449612 386,611.468562 C386,611.037898 385.913986,610.693368 385.827972,610.348837 L374.302082,541.184324 L374.302082,541.184324 Z M327.854464,530.159345 C327.854464,525.680448 331.467057,522.062877 335.93979,522.062877 C340.412524,522.062877 344.025116,525.680448 344.025116,530.159345 L344.025116,538.255814 L327.854464,538.255814 L327.854464,530.159345 L327.854464,530.159345 Z M293.62085,608.023256 L304.028557,545.318691 L320.801307,545.318691 L320.801307,565.043066 C320.801307,567.024117 322.349561,568.574505 324.327886,568.574505 C326.30621,568.574505 327.854464,567.024117 327.854464,565.043066 L327.854464,545.318691 L344.025116,545.318691 L344.025116,565.043066 C344.025116,567.024117 345.57337,568.574505 347.551694,568.574505 C349.530019,568.574505 351.078273,567.024117 351.078273,565.043066 L351.078273,545.318691 L367.851024,545.318691 L378.25873,608.023256 L293.62085,608.023256 L293.62085,608.023256 Z">
											</path>
										</g>
									</g>
								</svg>
								<span class="count_item_pr">0</span>
							</a>

						</div>


					</div>
				</div>
			</div>
		</div>

	</header>
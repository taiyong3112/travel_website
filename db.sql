INSERT INTO `destinations`(name,slug,image,status) VALUES
('Phú Quốc','phu-quoc','phuquoc.jpg', 1),
('Hạ Long','ha-long','halong.jpg', 1),
('Sapa','sa-pa','sapa.jpg', 1),
('Hà Nội','ha-noi','hanoi.jpg', 1),
('Thành Phố Hồ Chí Minh','thanh-pho-ho-chi-minh','hochiminh.jpg', 1),
('Quy Nhơn','quy-nhon','quynhon.jpg', 1),
('Đà Nẵng','da-nang','danang.jpg', 1);

INSERT INTO `tours`(name, slug, destination_id, summary, content, image, adult_price, children_price, duration, status) VALUES
('Tour đảo Phú Quốc', 'tour-dao-phu-quoc', 1, 'Tận hưởng vẻ đẹp của biển xanh và cát trắng tại Hòn Móng Tay, Hòn Dăm Ngang, Hòn Mây Rút Trong, và Hòn Mây Rút Ngoài trong 1 ngày', 'Yêu thích thiên đường Phú Quốc và mong muốn khám phá các hòn đảo nơi đây? Tour 4 đảo Phú Quốc sẽ là sự lựa chọn tuyệt vời của bạn. Trên chiếc ca-nô tốc độ, bạn sẽ được đưa đến 4 đảo là Hòn Móng Tay, Hòn Dăm Ngang, Hòn Mây Rút Trong, và Hòn Mây Rút Ngoài. Nếu Hòn Móng Tay nhẹ nhàng với màu nước xanh ngọc bích thì Hòn Dăm Ngang gồ ghề với những rặng san hô đẹp chết người. Tiếp theo hãy thử hóa thân thành Robinson để khám phá vẻ hoang sơ của Hòn Mây Rút Trong và Hòn Mây Rút Ngoài. Cuối cùng bạn sẽ đến bè cá và thưởng thức hải sản tại nhà hàng nổi trên biển hơi bị thú vị đó nha!','phuquoc.jpg', 1050000, 750000, 1, 1),
('Tour Đà Nẵng - Hội An', 'tour-da-nang-hoi-an', 7, 'Tour du lịch 4 ngày 3 đêm tại Đà Nẵng - Hội An', 'Bạn có biết Hội An được Rough Guides bình chọn là địa danh đẹp nhất Việt Nam? Tạp chí USA Today đã miêu tả Hội An là một trong 10 điểm đến đẹp nhất Đông Nam Á, đem đến cho du khách cảm giác “bình yên và vĩnh cửu”. Hay New York Times của Mỹ đã bình chọn Hội An là một trong 20 điểm đến của thanh xuân? Chưa kể Lonely Planet đã ca ngợi Hội An là thiên đường thức ăn trên thế giới và TripAdvisor đã chọn nơi này là một trong 10 điểm đến ẩm thực Châu Á. Bạn có biết Cù Lao Chàm một trong 15 khu bảo tồn biển của Việt Nam và được UNESCO công nhận là khu dự trữ sinh quyển thế giới? Bạn có biết khu du lịch Bà Nà có hệ thống cáp treo ấn tượng nhất thế giới với khí hậu mát mẻ quanh năm khi được mệnh danh là “Sapa của miền Trung”? Bạn có biết Đà Nẵng chính là “thành phố đáng sống nhất Việt Nam” với “bãi biển quyến rũ nhất thế giới” do Forbes bình chọn? Đi ngay với chúng tôi để đặt chân đến những địa danh đình đám này nhé!', 'hoi-an.jpg', 4950000, 3550000, 4, 1),
('Du lịch Quy Nhơn', 'du-lich-quy-nhon', 6, 'Trải nghiệm Quy Nhơn : Ghềnh Ráng Tiên Sa - Eo Gió-Bay trong 4 ngày','Trải nghiệm Eo Gió với nét hoang sơ với những bãi cát trắng uốn cong hình trăng khuyết. Trải nghiệm đi tàu thăm đảo Kỳ Co hoang sơ Khu dã ngoại Trung Lương là địa điểm được ưa thích để tổ chức các hoạt động ngoài trời, dã ngoại vì không khí thanh bình, cảnh sắc hùng vĩ, nên thơ Khu du lịch Hầm Hô - Lâm viên hoang dã và nên thơ', 'quynhon.jpg', 5590000, 4890000, 4, 1),
('Du lịch Hà Nội - Bát Tràng - Ninh Bình', 'du-lich-ha-noi-bat-trang-ninh-binh', 4, 'Trải nghiệm tại Hà Nội - Bát Tràng - Ninh Bình trong 3 ngày, 2 đêm', '- Ngắm cảnh hồ Tây, viếng chùa Trấn Quốc; thăm Văn Miếu Quốc Tử Giám, đi xe điện thăm khu phố cổ “36 phố phường” với những ngành nghề đặc trưng truyền thống của cư dân Thủ đô - Viếng chùa Bái Đính - ngôi chùa của những kỷ lục như: Khu chùa rộng nhất Việt Nam - Tham quan làng gốm Bát Tràng với tuổi đời hơn 500 năm', 'thap-rua.jpg', 4000000, 3000000, 3, 1),
('Du Lịch Hạ Long', 'du-lich-ha-long', 2, 'Tour du lịch Hà Nội - Hạ Long 2 ngày 1 đêm', 'Đến với Hạ Long du khách đừng quên... - Thưởng thức vẻ đẹp của Hạ Long với Hòn Trống Mái, Lục Đỉnh Hương. - Khám phá Động Thiên Cung: hang động rộng và đẹp nổi tiếng của Vịnh Hạ Long, động chia làm nhiều ngăn với vô vàn nhũ đá tạo thành các hình thù kỳ dị và hấp dẫn, nơi có cảnh đẹp được ví như cung điện của nhà trời. - Thưởng thức Nhạc Nước Tuần Châu: Công trình trình diễn nhạc nước được thiết kế trên một lòng hồ rộng lớn có diện tích 2,5ha. Bao quanh là những đồi thông xanh ngắt và bờ biển với những con sóng rì rào vỗ đêm ngày. Công trình biểu diễn nhạc nước Tuần Châu như một con sò lớn chứa đựng bên trong nhiều điều thú vị với khách du lịch Tuần Châu', 'ha_long_beauty.jpg', 2100000, 1300000, 2, 1),
('Chinh phục đỉnh Fansipan', 'chinh-phuc-dinh-fansipan', 3, 'Chinh phục Fansipan - Nóc nhà Đông Dương', 'Đỉnh Fansipan là khao khát chinh phục của những trái tim nồng nhiệt muốn vươn tới đỉnh cao. Với độ cao 3143m, hành trình chinh phục 2 ngày 1 đêm, đỉnh Fansipan còn là nơi để những người trẻ thể hiện sự quyết tâm, sức bền của ý chí và thể lực trước thử thách gian nan. Khoảnh khắc chạm tới đỉnh cao và phá vỡ mọi giới hạn ghi dấu hành trình lên đỉnh cũng là hành trình chiến thắng bản thân. Đăng kí ngay và sẵn sàng trải nghiệm một dấu ấn tuyệt vời thôi nào!', 'phan_xi_pang.jpg', 2650000, 1500000, 2, 1)
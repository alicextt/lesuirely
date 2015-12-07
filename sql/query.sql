# ********Author: Pooja, TingTing, Allan, Shubham @ Date: 2015 Fall ************-

alter table purchaseDetail auto_increment=3;

select * from (
select ord.*, purchaseInfo.purchasedate, purchaseInfo.status, purchaseInfo.userId
from (select p.purchaseId, p.category,p.catid, p.type,tmp.price, p.qty, tmp.imgurl, tmp.title from  purchaseDetail p,
(select  title, imgurl, id, 'movie' as category, price from movie union (select  title, imgurl, id, 'book' as category, price from book)) tmp
where p.category=tmp.category and p.catid=tmp.id order by p.purchaseId) ord , purchaseInfo where ord.purchaseId=purchaseInfo.purchaseId
) a join (
select pu.purchaseId, pu.purchasedate, pu.status, ad.person, ad.address1, ad.address2, ad.city, ad.phone, pay.cardType, pay.creditCardNumber
from purchaseInfo pu, payment pay, address ad where pu.addressId=ad.addressId and pu.paymentId=pay.paymentId ) b
on a.purchaseId=b.purchaseId where a.userId=1 order by a.purchasedate desc;

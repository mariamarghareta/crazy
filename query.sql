create or replace view current_gel as
select id from gelombang where active = true

create or replace view total_poin_peserta as
SELECT p.id, p.nama, p.wilayah_id, tny.gelombang_id, sum(case when jwb.jawaban = tny.jawaban and tny.active = 2 then 1 else 0 end) as score
from pengguna p
left join jawabpertanyaan jwb on p.id = jwb.pengguna_id
left join pertanyaan tny on tny.id = jwb.soal_id
where p.deleted = 0
group by p.id, p.nama, p.wilayah_id, tny.gelombang_id
order by p.nama

create or replace view total_poin_wilayah as
select p.wilayah_id, tny.gelombang_id, sum(case when jwb.jawaban = tny.jawaban then 1 else 0 end) as score
from jawabpertanyaan jwb
left join pertanyaan tny on tny.id = jwb.soal_id
left join pengguna p on p.id = jwb.pengguna_id
where tny.active = 2 and p.deleted = 0
group by p.wilayah_id, tny.gelombang_id
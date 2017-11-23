create trigger oltp_user_after_ins_trig after insert on oltp_user for each row begin insert into oltp_profil (id_user, email) values (new.id_user, new.email); end#

CREATE VIEW view_laporan_diklat as
select a.id_peserta as id,b.nama,c.keterangan,c.tgl_mulai,c.tgl_selesai from oltp_peserta_diklat a 
left join oltp_peserta b on a.id_peserta=b.id
left join ref_diklat c on a.id_diklat=c.id_diklat
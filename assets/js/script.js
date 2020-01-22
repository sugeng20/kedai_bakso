$(function () {


	// Membuat Otomatis muncul harga
	$("#nama_masakan").on('click', function () {
		const id = $("#nama_masakan option:selected").attr("value");
		$.ajax({
			url: 'http://localhost/kedai_bakso/transaksi/getMasakan',
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				if (data.stok > 0) {
					$('#harga_satuan').val(data.harga)
				} else {
					alert('Masakan Sudah Habis')
					$('#nama_masakan').val("")
				}
			}
		})

	})

	// Membuat Otomotatis muncul total harga pesan
	$('#jumlah_pesan').on('change', function () {
		var harga = $('#harga_satuan').val();
		var jumlah = $(this).val();
		var total_pesan = harga * jumlah;
		$('#total').val(total_pesan)
	})

	// Membuat Tambah Pesanan dan muncul otomotas ke list pesanan
	let bayar_kasir = 0;
	let order = [];
	let no = 1;
	$('#tambah_pesanan').on('click', function () {

		let list = [];

		// Mengambil nilai input
		let id_transaksi = $('#id_transaksi').val();
		let id_masakan = $('#nama_masakan option:selected').attr('value');
		let nama_masakan = $('#nama_masakan option:selected').attr('data');
		let harga_satuan = $('#harga_satuan').val()
		let jumlah_pesan = $('#jumlah_pesan').val()
		let total = parseInt($('#total').val())

		if (jumlah_pesan == "") {
			alert("Isi Terlebih dahulu Pesanan");
		} else {
			$.ajax({
				url: 'http://localhost/kedai_bakso/transaksi/tambah_menu',
				data: {
					id_transaksi: id_transaksi,
					id_masakan: id_masakan,
					nama_masakan: nama_masakan,
					harga_satuan: harga_satuan,
					jumlah_pesan: jumlah_pesan,
					total: total,
				},
				method: 'post',
				dataType: 'json',
				success: function (data) {
					console.log(data);
				}
			})

			// Menambahkna ke array list
			list.push({
				'id_masakan': id_masakan,
				'nama_masakan': nama_masakan,
				'harga_satuan': harga_satuan,
				'jumlah_pesan': jumlah_pesan,
				'total': total
			});

			// Otomotis menjumlahkan total bayar
			bayar_kasir += total;
			$('#bayar').val(bayar_kasir);

			// Melakukan pengulangan di list pesanan
			$.each(list, function (i, data) {
				$('#list_pesan').append(`
				<tr>
					<td>` + no++ + `</td>
					<td>` + data.nama_masakan + `</td>
					<td>` + data.harga_satuan + `</td>
					<td>` + data.jumlah_pesan + `</td>
					<td>` + data.total + `</td>
				</tr>
			`)
			})

			// Menghapus nilai
			$('#nama_masakan').val("")
			$('#harga_satuan').val("");
			$('#jumlah_pesan').val("");
			$('#total').val("")
		}
	});

	$('#bayar_transaksi').on('click', function () {
		let id_user = $('#id_user').val();
		let id = $('#id_transaksi').val();
		let total_bayar = $('#bayar').val();

		if (total_bayar == "") {
			alert("Tambah Menu Terlebih dahulu")
		} else {
			$.ajax({
				url: 'http://localhost/kedai_bakso/transaksi/bayar_transaksi',
				data: {
					id_user: id_user,
					total_bayar: total_bayar
				},
				method: 'post',
				dataType: 'json',
				success: function (data) {

				}
			})
			alert("Berhasil Menambahkan Transaksi");
			window.location.reload();

		}
	})

	$('#batal_transaksi').on('click', function () {
		let id_transaksi = $('#id_transaksi').val();
		let total_bayar = $('#bayar').val();

		if (total_bayar == "") {
			alert("Tambah menu terlebih dahulu");
			console.log("oke")
		} else {
			$.ajax({
				url: 'http://localhost/kedai_bakso/transaksi/batal_transaksi',
				data: {
					id_transaksi: id_transaksi
				},
				method: 'post',
				dataType: 'json',
				success: function (data) {

				}
			})
			alert("Transaksi Berhasil dibatalkan");
			window.location.reload();
		}
	})
})



$('.custom-file-input').on('change', function () {
	let fileName = $(this).val().split('\\').pop();
	$(this).next('.custom-file-label').addClass("selected").html(fileName);
});

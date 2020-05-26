    <!-- Jquery Core Js -->
    <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/raphael/raphael.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/flot-charts/jquery.flot.js"></script>
    <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url(); ?>assets/dashAssets/js/admin.js"></script>
    <script src="<?php echo base_url(); ?>assets/dashAssets/js/script.js"></script>
    <script src="<?php echo base_url(); ?>assets/dashAssets/js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="<?php echo base_url(); ?>assets/dashAssets/js/demo.js"></script>

	<!--NEEM-SDK-->
	<script src="<?=base_url()?>assets/nem-sdk/dist/nem-sdk.js"></script>

	<!-- Script -->
	<script type="text/javascript">
		// MOSAIC TX
		// var nem = require("nem-sdk").default;
		// var endpoint = nem.model.objects.create("endpoint")(nem.model.nodes.defaultTestnet, nem.model.nodes.defaultPort);
		//
		// var common = nem.model.objects.create("common")("", "923b6d0f5148c2c9d7c542c156824d77efe00e3f81b87a9ef990e42bf7a3c0ff");
		//
		// var transferTransaction = nem.model.objects.create("transferTransaction")("TDOMJAHLOXWYUJH2SSTPICNVUEHPRXSFJXFGPGT5", 1, "test IDR Mosaic");
		//
		// var mosaicDefinitions = nem.model.objects.get("mosaicDefinitionMetaDataPair");
		//
		// var mosaicAttachment = nem.model.objects.create("mosaicAttachment")("donation", "idr", 1);
		//
		// transferTransaction.mosaics.push(mosaicAttachment);
		//
		// nem.com.requests.namespace.mosaicDefinitions(endpoint, mosaicAttachment.mosaicId.namespaceId).then(function (res) {
		// 	var definitions = nem.utils.helpers.searchMosaicDefinitionArray(res.data, ["idr"]);
		// 	var fullname = nem.utils.format.mosaicIdToName(mosaicAttachment.mosaicId);
		//
		// 	mosaicDefinitions[fullname] = {};
		// 	mosaicDefinitions[fullname].mosaicDefinition = definitions[fullname];
		//
		// 	var preparedTransaction = nem.model.transactions.prepare('mosaicTransferTransaction')(common, transferTransaction, mosaicDefinitions, nem.model.network.data.testnet.id);
		// 	preparedTransaction.fee = 1000000;
		//
		// 	nem.model.transactions.send(common, preparedTransaction, endpoint).then(function (res) {
		// 		console.log(res);
		// 	}, function (err) {
		// 		console.log(err);
		// 	});
		//
		// }, function (err) {
		// 	console.log(err);
		// });
		// END OF MOSAIC TX

		// XEM TX
		// var nem = require("nem-sdk").default;
		// var endpoint = nem.model.objects.create("endpoint")(nem.model.nodes.defaultTestnet, nem.model.nodes.defaultPort);
		// var common = nem.model.objects.create("common")("", "923b6d0f5148c2c9d7c542c156824d77efe00e3f81b87a9ef990e42bf7a3c0ff");
		// var transferTransaction = nem.model.objects.create("transferTransaction")("TDOMJAHLOXWYUJH2SSTPICNVUEHPRXSFJXFGPGT5", 2, "Cleaning...");
		// var preparedTransaction = nem.model.transactions.prepare('transferTransaction')(common, transferTransaction, nem.model.network.data.testnet.id);
		// 	nem.model.transactions.send(common, preparedTransaction, endpoint).then(function (res) {
		// 		console.log(res);
		// 	}, function (err) {
		// 		console.log(err);
		// 	});
		// END XEM TX
	</script>

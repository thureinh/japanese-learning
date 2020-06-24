// Asynchronous Delete

class AsyncTable
{
	constructor(table, csrf, url)
	{
		this.table = table;
		this.csrf = csrf;
		this._url = url;
	}
	set targetRow(row) {
		this._row = row;
		this._rowid = this.extractRowID(row);
	}
	get targetRow() {
		return this._row;
	}
	set rowID(rowid) {
		this._rowid = rowid;
	}
	get rowID() {
		return this._rowid;
	}
	extractRowID = row => {
		let row_id_str = row.attr('id');
		let str = row_id_str.split('-');
		return str[1];
	}
	set url(url) {
		this._url = url;
	}
	get url() {
		return this._url;
	}
	deleteRow = () => {
		let header = this.csrf;
		let deleter = this.deleteDTRow;
		$.ajax({
			'url': this._url + "/" + this._rowid,
			'type': 'DELETE',
			'dataType': 'json',
			'beforeSend': function (xhr){ xhr.setRequestHeader('X-CSRF-TOKEN', header); },
			'success': function (result){
				deleter();
			}
		});
	}
	updateRow = (form, arr, parents) => {
		let header = this.csrf;
		let updater = this.updateDTRow;
		$.ajax({		
			'url': this._url + "/" + this._rowid,
			'type': 'PUT',
			'dataType': 'json',
			'data': form.serialize(),
			'beforeSend': function (xhr){ xhr.setRequestHeader('X-CSRF-TOKEN', header); },
			'success': function (result){
				updater(result, arr, parents);
			}
		});	
	}
 	deleteDTRow = () => {
			this.table.row(this._row).remove().draw(false);
	}
	updateDTRow = (data, arr, parents = []) => {
			let parentChanged = false;
			if(parents.length !== 0)
			{
				if(parents[0] !== data[parents[1]])
					parentChanged = true; 
			}

			if(parentChanged)
			{
				this.deleteDTRow();
			}
			else
			{
				let row_data = this.table.row(this._row).data();
				for (let i = 0; i < arr.length; i++) {
				 	if(arr[i] === '') continue;
				 	row_data[i] = data[arr[i]];
				}
				this.table.row(this._row).data(row_data).draw(false);
			}
	}
	editRow = (callback) => {
		let header = this.csrf;
		$.ajax({		
			'url': this._url + '/' + this._rowid + '/edit',
			'type': 'GET',
			'dataType': 'json',
			'beforeSend': function (xhr){ xhr.setRequestHeader('X-CSRF-TOKEN', header); },
			'success': function (result){
				callback(result);
			}
		});

	}
	
}

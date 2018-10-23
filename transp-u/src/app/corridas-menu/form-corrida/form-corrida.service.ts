
import {map} from 'rxjs/operators';
import { Http, Headers, RequestOptions, Response } from '@angular/http';
import { Injectable } from '@angular/core';
import { FormCorrida } from './form-corrida.model';
import { API } from '../../app.api';


@Injectable()
export class FormCorridaService{

	constructor(private http: Http){}

	cadastrarCorrida(formCorrida: FormCorrida){
		let headers = new Headers({'Content-Type':'application/json'});
		let request = new RequestOptions({headers: headers})
		let body = JSON.stringify(formCorrida);
		return this.http.post(`${API}/corrida/create.php`, body, request).pipe(map((message: Response) => message.json()));
	}
}

import { API } from '../../app.api';
import { FormPassageiro } from './form-passageiro.model';
import { Injectable } from '@angular/core';
import { Http, Headers, RequestOptions, Response } from '@angular/http';
import { map } from 'rxjs/operators';

@Injectable()
export class FormPassageiroService{

    constructor(private http: Http){}

    cadastrarPassageiro(formPassageiro: FormPassageiro){
        let headers = new Headers({'Content-Type':'application/json'});
        let request = new RequestOptions({headers: headers})
        let body = JSON.stringify(formPassageiro);;
        return this.http.post(`${API}/passageiro/create.php`, body, request).pipe(map((message: Response) => message.json()));
    }
}

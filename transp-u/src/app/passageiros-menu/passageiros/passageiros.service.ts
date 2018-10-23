import { API } from '../../app.api';
import { Http } from '@angular/http';
import { Injectable } from '@angular/core';
import { map } from 'rxjs/operators';
import { Observable } from 'rxjs';
import { Passageiro } from './passageiro/passageiro.model';


@Injectable()
export class PassageirosService{

    constructor(private http: Http){}

    passageiros(): Observable<Passageiro[]>{
        return this.http.get(`${API}/passageiro/read-all.php`).pipe(
            map(response => response.json())
        );
    }
}

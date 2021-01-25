import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { HouseKipreyComponent } from './house-kiprey/house-kiprey.component';
import { PageNotFoundComponent } from './page-not-found/page-not-found.component';

const routes: Routes = [
  {path: '', component: HouseKipreyComponent},
  {path: '**', component: PageNotFoundComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }

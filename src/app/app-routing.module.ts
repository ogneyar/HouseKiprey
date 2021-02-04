import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { BenefitsComponent } from './benefits/benefits.component';
import { HouseKipreyComponent } from './house-kiprey/house-kiprey.component';
import { HowToComponent } from './how-to/how-to.component';
import { PageNotFoundComponent } from './page-not-found/page-not-found.component';
import { PositiveComponent } from './positive/positive.component';
import { ReviewsComponent } from './reviews/reviews.component';

const routes: Routes = [
  {path: '', component: HouseKipreyComponent},
  {path: 'reviews', component: ReviewsComponent},  
  {path: 'benefits', component: BenefitsComponent},
  {path: 'positive', component: PositiveComponent},
  {path: 'how-to', component: HowToComponent},
  {path: '**', component: PageNotFoundComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }

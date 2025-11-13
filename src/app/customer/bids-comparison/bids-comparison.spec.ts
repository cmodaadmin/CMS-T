import { ComponentFixture, TestBed } from '@angular/core/testing';

import { BidsComparison } from './bids-comparison';

describe('BidsComparison', () => {
  let component: BidsComparison;
  let fixture: ComponentFixture<BidsComparison>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [BidsComparison]
    })
    .compileComponents();

    fixture = TestBed.createComponent(BidsComparison);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

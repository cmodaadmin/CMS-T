import { ComponentFixture, TestBed } from '@angular/core/testing';

import { NotificationsManagement } from './notifications-management';

describe('NotificationsManagement', () => {
  let component: NotificationsManagement;
  let fixture: ComponentFixture<NotificationsManagement>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [NotificationsManagement]
    })
    .compileComponents();

    fixture = TestBed.createComponent(NotificationsManagement);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

import { describe, it, expect, vi } from 'vitest';
import '@testing-library/jest-dom';
import { render, screen } from '@testing-library/react';
import Header from '../components/Header';

describe('Header', () => {
  test('renders header with title', () => {
    render(<Header />);
    expect(screen.getByText(/kanban/i)).toBeInTheDocument();
  });
});

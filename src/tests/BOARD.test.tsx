import { render, screen } from '@testing-library/react';
import BOARD from '../components/BOARD';
import { DndProvider } from 'react-dnd';
import { HTML5Backend } from 'react-dnd-html5-backend';
import { describe, it, expect, vi } from 'vitest';
import '@testing-library/jest-dom';

describe('BOARD', () => {
  const columns = [
    { id: 1, title: 'À faire', tasks: [{ id: 1, title: 'Tâche 1' }] },
    { id: 2, title: 'En cours', tasks: [] },
  ];

  test('renders columns and tasks', () => {
    render(
      <DndProvider backend={HTML5Backend}>
        <BOARD columns={columns} setColumns={() => {}} />
      </DndProvider>
    );
    expect(screen.getByText('À faire')).toBeInTheDocument();
    expect(screen.getByText('Tâche 1')).toBeInTheDocument();
    expect(screen.getByText('En cours')).toBeInTheDocument();
  });
});
